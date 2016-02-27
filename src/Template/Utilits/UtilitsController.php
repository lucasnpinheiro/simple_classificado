<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;

/**
 * CakePHP UtilisController
 * @author lucas
 */
class UtilitsController extends AppController {

    public function cep($cep) {
        $cep = str_replace('-', '', $cep);
        $this->layout = 'ajax';
        $http = new Client();
        $response = $http->get('http://cep.agenciavoxel.com.br/' . $cep . '.json');
        $this->set('retorno', json_decode($response->body(), true));
    }

}
