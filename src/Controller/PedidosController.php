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
            debug(ROOT);
            require ROOT . '/vendor/pagseguro/php/source/PagSeguroLibrary/PagSeguroLibrary.php';
            $paymentRequest = new \PagSeguroPaymentRequest();
            foreach ($pedido->produtos as $k => $v) {
                $paymentRequest->addItem($v->_joinData->id, $v->nome, (float) $v->_joinData->quantidade, (float) $v->_joinData->valor);
            }
            $sedexCode = \PagSeguroShippingType::getCodeByType('NOT_SPECIFIED');
            $paymentRequest->setShippingType($sedexCode);
            $cliente = $this->Clientes->get($cliente_id);
            $paymentRequest->setShippingAddress(
                    $cliente->cep, $cliente->logradouro, $cliente->numero, $cliente->complemento, $cliente->bairro, $cliente->cidade, $cliente->estado, 'BRA'
            );

            $paymentRequest->setSender(
                    $cliente->nome, $cliente->email, '16', '9999999', 'CPF', $cliente->documento
            );
            $paymentRequest->setCurrency("BRL");
            $paymentRequest->setReference($pedido->id);
            $paymentRequest->setRedirectUrl(\Cake\Routing\Router::url(['action' => 'index'], true));
            $paymentRequest->addParameter('notificationURL', \Cake\Routing\Router::url(['action' => 'pageguro_retorno'], true));
            try {

                $credentials = \PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()
                $checkoutUrl = $paymentRequest->register($credentials);
                $this->Flash->success('Pedido finalizado com sucesso.');
                return $this->redirect($checkoutUrl);
            } catch (PagSeguroServiceException $e) {
                die($e->getMessage());
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

}

class PagSeguroConfigWrapper {

    public static function getConfig() {
        $PagSeguroConfig = array();
        $PagSeguroConfig['environment'] = "sandbox"; // production, sandbox
        $PagSeguroConfig['credentials'] = array();
        $PagSeguroConfig['credentials']['email'] = "v09994377416722063630@sandbox.pagseguro.com.br";
        $PagSeguroConfig['credentials']['token']['production'] = "your_production_pagseguro_token";
        $PagSeguroConfig['credentials']['token']['sandbox'] = "PUBB94107D7781148EB8777285747670F76";
        $PagSeguroConfig['credentials']['appId']['production'] = "your__production_pagseguro_application_id";
        $PagSeguroConfig['credentials']['appId']['sandbox'] = "app6745043768";
        $PagSeguroConfig['credentials']['appKey']['production'] = "your_production_application_key";
        $PagSeguroConfig['credentials']['appKey']['sandbox'] = "0F8F59D41515D3BAA444FFAC8E8CFEAE";
        $PagSeguroConfig['application'] = array();
        $PagSeguroConfig['application']['charset'] = "UTF-8"; // UTF-8, ISO-8859-1
        $PagSeguroConfig['log'] = array();
        $PagSeguroConfig['log']['active'] = false;
        // Informe o path completo (relativo ao path da lib) para o arquivo, ex.: ../PagSeguroLibrary/logs.txt
        $PagSeguroConfig['log']['fileLocation'] = "";
        return $PagSeguroConfig;
    }

}
