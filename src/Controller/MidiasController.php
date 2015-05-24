<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * CakePHP MidiaController
 * @author lucas
 */
class MidiasController extends AppController {

    public function upload() {
        
    }

    public function lista() {
        $retorno = [];
        $dir = new Folder(WWW_ROOT . 'files');
        $files = $dir->find('.*\.(gif|png|jpg|jpe|jpeg)', true);
        if (count($files) > 0) {
            foreach ($files as $k => $file) {
                $retorno[] = [
                    "thumb" => \Cake\Routing\Router::url('/files/' . $file, true),
                    "image" => \Cake\Routing\Router::url('/files/' . $file, true),
                    "title" => "Imagem " . ($k + 1)
                ];
            }
        }
        echo json_encode($retorno);
        exit;
    }

}
