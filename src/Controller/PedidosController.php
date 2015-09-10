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

}
