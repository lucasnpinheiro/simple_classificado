<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        $this->set('pedidos', $this->paginate($this->Pedidos));
        $this->set('_serialize', ['pedidos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Clientes', 'Produtos']
        ]);
        $this->set('pedido', $pedido);
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success('The pedido has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The pedido could not be saved. Please, try again.');
            }
        }
        $clientes = $this->Pedidos->Clientes->find('list', ['limit' => 200]);
        $produtos = $this->Pedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'clientes', 'produtos'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Produtos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success('The pedido has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The pedido could not be saved. Please, try again.');
            }
        }
        $clientes = $this->Pedidos->Clientes->find('list', ['limit' => 200]);
        $produtos = $this->Pedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'clientes', 'produtos'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
