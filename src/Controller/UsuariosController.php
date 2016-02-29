<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Email\Email;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController {

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['prefix' => 'admin', 'controller' => 'Usuarios', 'action' => 'index']);
            }
            $this->Flash->error(__('Usuário ou senha invalidos.'));
        } else {
            if (!is_null($this->Auth->user())) {
                return $this->redirect(['prefix' => 'admin', 'controller' => 'Usuarios', 'action' => 'index']);
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function contato() {
        if ($this->request->is('post')) {

            $email = new Email('System');
            if ($email->from([\Cake\Core\Configure::read('Email.Email') => \Cake\Core\Configure::read('Email.Nome')])
                            ->to($this->request->data['Usuario']['email'])
                            ->subject($this->request->data['Usuario']['nome'])
                            ->send($this->request->data['Usuario']['assunto'])) {
                $this->Flash->success('Mensagem enviada com sucesso.');
            } else {
                $this->Flash->error('Não foi possivel enviar a sua mensagem.');
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null) {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (trim($this->request->data['senha']) == '') {
                unset($this->request->data['senha']);
            }
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if (trim($this->request->data['senha']) == '') {
                $usuario->senha = null;
            }
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('The usuario has been saved.');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('The usuario could not be saved. Please, try again.');
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }*/

}
