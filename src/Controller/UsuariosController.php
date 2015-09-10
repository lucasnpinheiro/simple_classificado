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
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuário ou senha invalidos.'));
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

}
