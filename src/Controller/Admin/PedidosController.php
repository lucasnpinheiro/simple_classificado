<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;
use Cake\ORM\TableRegistry;
/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppAdminController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        $this->set('pedidos', $this->paginate($this->Pedidos));
        $this->set('_serialize', ['pedidos']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Clientes']
        ]);
        
        $p = TableRegistry::get('PedidosProdutos');
        $produtos = $p->find('all')->where(['pedido_id' => $id])->contain(['Produtos']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success('The pedido has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The pedido could not be saved. Please, try again.');
            }
        }
        $this->set(compact('pedido', 'produtos'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success('The pedido has been deleted.');
        } else {
            $this->Flash->error('The pedido could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
