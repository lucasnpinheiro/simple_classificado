<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// In a controller or table method.
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;


$configuracoes = TableRegistry::get('Configuracoes.Configuracoes');
$find = $configuracoes->find('all');
$retorno = [];
if (count($find) > 0) {
    foreach ($find as $key => $value) {
        $retorno[$value->chave] = $value->value;
    }
}
\Cake\Core\Configure::write($retorno);
unset($configuracoes, $find, $retorno);

Email::configTransport('System', [
    'host' =>\Cake\Core\Configure::read('Email.Host'),
    'port' => \Cake\Core\Configure::read('Email.Porta'),
    'username' => \Cake\Core\Configure::read('Email.Email'),
    'password' => \Cake\Core\Configure::read('Email.Senha'),
    'tls' => \Cake\Core\Configure::read('Email.Ssl'),
    'className' => 'Smtp'
]);
