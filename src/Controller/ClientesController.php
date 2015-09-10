<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 */
class ClientesController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $options = [];
            if ($this->request->data['documento'] != '') {
                $options['Clientes.documento'] = $this->request->data['documento'];
            }
            if ($this->request->data['email'] != '') {
                $options['Clientes.email'] = $this->request->data['email'];
            }

            $cliente = $this->Clientes->find()->where($options)->first();
            if (!$cliente OR empty($options)) {
                return $this->redirect(['action' => 'add']);
            }
            $this->request->session()->write('Cliente', $cliente->toArray());
            return $this->redirect(['controller' => 'PedidosProdutos', 'action' => 'index']);
        }
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success('Cliente cadastrado com sucesso.');
                $this->request->session()->write('Cliente', $cliente->toArray());
                return $this->redirect(['controller' => 'PedidosProdutos', 'action' => 'index']);
            } else {
                $this->Flash->error('Não foi possivel cadastrar o cliente.');
            }
        }
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }

    public function logout() {
        $this->request->session()->delete('Cliente');
        $this->redirect($this->referer());
    }

}
