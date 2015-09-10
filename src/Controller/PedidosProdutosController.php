<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * PedidosProdutos Controller
 *
 * @property \App\Model\Table\PedidosProdutosTable $PedidosProdutos
 */
class PedidosProdutosController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Produtos', 'Pedidos'],
            'limit' => 1000,
            'conditions' => [
                'PedidosProdutos.pedido_id' => $this->request->session()->read('Cart.id')
            ]
        ];
        $pedidos = $this->paginate($this->PedidosProdutos);
        $pedido = $pedidos;
        if (count($pedido->toArray()) == 0) {
            $this->redirect('/');
        }
        $this->set('pedidosProdutos', $pedidos);
        $this->set('_serialize', ['pedidosProdutos']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $pedidosProduto = $this->PedidosProdutos->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['pedido_id'] = $this->__add();
            $pedidosProduto = $this->PedidosProdutos->patchEntity($pedidosProduto, $this->request->data);
            if ($this->PedidosProdutos->save($pedidosProduto)) {
                $this->Flash->success('Produto adicionado com sucesso.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Não foi possivel adicionar o produto.');
            }
        }
        $this->set(compact('pedidosProduto'));
        $this->set('_serialize', ['pedidosProduto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedidos Produto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pedidosProduto = $this->PedidosProdutos->get($id);
        if ($this->PedidosProdutos->delete($pedidosProduto)) {
            $this->Flash->success('The pedidos produto has been deleted.');
        } else {
            $this->Flash->error('The pedidos produto could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    private function __add() {
        $this->loadModel('Pedidos');
        $id = $this->request->session()->read('Cart.id');
        if (!$id) {
            $pedidos = $this->Pedidos->patchEntity($this->Pedidos->newEntity(), ['status' => 0]);
            $this->Pedidos->save($pedidos);
            $this->request->session()->write('Cart.id', $pedidos->id);
            $id = $pedidos->id;
        }
        return $id;
    }

}
