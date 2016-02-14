<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppAdminController {

    public $presetVars = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'email' => ['type' => 'like'],
        'senha' => ['type' => 'like'],
        'status' => ['type' => 'value'],
        'created' => ['type' => 'like'],
        'modified' => ['type' => 'like'],
        'updated' => ['type' => 'like'],
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->loadComponent('Search.Prg');
        $this->Prg->commonProcess($this->name,['action'=>'index']);
        $options = [
            'order' => ['Usuarios.nome' => 'ASC'],
            'conditions' => $this->Prg->parsedParams()
        ];
        $this->paginate = $options;
        $usuarios = $this->paginate($this->Usuarios);

        $usuario = $this->Usuarios->newEntity();
        $this->set(compact('usuarios', 'usuario'));
        $this->set('_serialize', ['usuarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('The usuario has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The usuario could not be saved. Please, try again.');
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (trim($this->request->data['senha']) == '') {
                unset($this->request->data['senha']);
            }
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('The usuario has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The usuario could not be saved. Please, try again.');
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success('The usuario has been deleted.');
        } else {
            $this->Flash->error('The usuario could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
