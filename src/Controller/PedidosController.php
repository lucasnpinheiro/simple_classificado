<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppController {

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function index($id = null, $cliente_id = null) {
        $this->request->allowMethod(['get']);
        $pedido = $this->Pedidos->get($id);
        $pedido->status = 1;
        $pedido->cliente_id = $cliente_id;
        if ($this->Pedidos->save($pedido)) {
            $this->Flash->success('Pedido finalizado com sucesso.');
            $this->request->session()->delete('Cart');
            return $this->redirect('/');
        } else {
            $this->Flash->error('Não foi possivel finalizar o pedido.');
            return $this->redirect($this->referer());
        }
    }

    public function pageguro($id = null, $cliente_id = null) {
        $this->loadModel('Clientes');
        $this->request->allowMethod(['get']);
        $pedido = $this->Pedidos->get($id, ['contain' => ['Produtos']]);
        $pedido->status = 1;
        $pedido->cliente_id = $cliente_id;
        if ($this->Pedidos->save($pedido)) {
            $ret = $this->_pagseguroXml($id, $cliente_id);
            if (!is_null($ret)) {
                $this->redirect($ret);
            }
        } else {
            $this->Flash->error('Não foi possivel finalizar o pedido.');
            return $this->redirect($this->referer());
        }
    }

    public function lista() {
        if ($this->request->session()->check('Cliente')) {
            $pedidos = $this->Pedidos->find()->where(['cliente_id' => $this->request->session()->read('Cliente.id')])->contain(['Produtos'])->all();
            $this->set(compact('pedidos'));
            $this->set('pedidos_titulo', 'Lista de Pedidos');
        } else {
            $this->redirect(['controller' => 'Clientes', 'action' => 'index']);
        }
    }

    public function pageguro_retorno() {
        $email = \Cake\Core\Configure::read('PagSeguro.Email');
        $token = \Cake\Core\Configure::read('PagSeguro.Token');
        $result = file_get_contents('https://ws.pagseguro.uol.com.br/v2/transactions/' . $this->request->query('transaction_id') . '?email=' . $email . '&token=' . $token);
        $result = json_decode(json_encode(simplexml_load_string($result)), true);

        $pedido = $this->Pedidos->get($result['reference']);
        if ($result['status'] == 3) {
            $pedido->status = 2;
        } else if ($result['status'] == 7) {
            $pedido->status = 3;
        }

        if ($this->Pedidos->save($pedido)) {
            $this->request->session()->delete('Cart');
            return $this->redirect('/');
        } else {
            $this->Flash->error('Não foi possivel finalizar o pedido.');
            return $this->redirect($this->referer());
        }
    }

    public function notificacoes() {
        $email = \Cake\Core\Configure::read('PagSeguro.Email');
        $token = \Cake\Core\Configure::read('PagSeguro.Token');
        $url = 'https://ws.pagseguro.uol.com.br/v2/transactions?initialDate=' . date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 30)) . 'T00:00&finalDate=' . str_replace(' ', 'T', date('Y-m-d H:i:s', mktime(date('H') - 2))) . '&page=1&maxPageResults=100&email=' . $email . '&token=' . $token;
        $retorno = file_get_contents($url);
        $retorno = json_decode(json_encode(simplexml_load_string($retorno)), true);

        if (!empty($retorno['transactions'])) {
            if (empty($retorno['transactions']['transaction'][0])) {
                $transaction = $retorno['transactions']['transaction'];
                unset($retorno['transactions']['transaction']);
                $retorno['transactions']['transaction'][0] = $transaction;
            }
            foreach ($retorno['transactions']['transaction'] as $key => $value) {
                $pedido = $this->Pedidos->get($value['reference']);
                if ($value['status'] == 3) {
                    $pedido->status = 2;
                } else if ($value['status'] == 7) {
                    $pedido->status = 3;
                }

                $this->Pedidos->save($pedido);
            }
        }
        exit;
    }

    private function _pagseguroXml($id = null, $cliente_id = null) {
        $this->loadModel('Clientes');
        $pedido = $this->Pedidos->get($id, ['contain' => ['Produtos']]);
        $cliente = $this->Clientes->get($cliente_id);

        $itens = [];

        foreach ($pedido->produtos as $k => $v) {
            $itens[] = '<item>  
                <id>' . $v->_joinData->id . '</id>  
                <description>' . trim(preg_replace("/( +)/", " ", $v->nome)) . '</description>  
                <amount>' . number_format((float) $v->_joinData->valor, 2, '.', '.') . '</amount>  
                <quantity>' . (float) $v->_joinData->quantidade . '</quantity>  
            </item>';
        }


        $xml = '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>  
                <checkout>  
                    <currency>BRL</currency>  
                    <items>  
                        ' . implode('', $itens) . '
                    </items>  
                    <reference>' . $pedido->id . '</reference>  
                    
                    <shipping>  
                        <type>3</type>  
                        
                    </shipping>  
                </checkout>';

        $email = \Cake\Core\Configure::read('PagSeguro.Email');
        $token = \Cake\Core\Configure::read('PagSeguro.Token');

        $url = 'https://ws.pagseguro.uol.com.br/v2/checkout?email=' . $email . '&token=' . $token;

        $headers = array(
            "Content-type: application/xml; charset=ISO-8859-1",
            "Content-length: " . strlen($xml),
            "Connection: close",
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $transaction = curl_exec($ch);
        curl_close($ch);

        if ($transaction === 'Unauthorized') {
            echo 'Erro na transação';
            return null;
        } else {
            $transaction = json_decode(json_encode(simplexml_load_string($transaction)));
            return 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $transaction->code;
        }
    }

}
