<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP Pinheiro
 * @author lpinheiro
 */

namespace App\View\Helper;

use Cake\ORM\TableRegistry;
use Cake\View\Helper;
use Cake\View\View;
use Cake\Utility\Hash;

class PinheiroHelper extends Helper {

    public $helpers = array('Html', 'Number');

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    public function categorias() {
        $categorias = TableRegistry::get('Categorias');
        return $categorias->find('all')->where(['status' => 1]);
    }

    public function listaBanners($posicao = 1, $limit = 3) {
        $banners = TableRegistry::get('Banners');
        return $banners->find('all')->where(['status' => 1, 'posicao' => $posicao])->order('RAND()')->limit($limit);
    }

    public function moeda($number, array $options = []) {
        $default = ['before' => 'R$ ', 'precision' => 2, 'places' => 2, 'locale' => 'pt_BR'];
        $options = Hash::merge($default, $options);
        return $this->Number->format($number, $options);
    }

    public function hasImage($img = null) {
        if (!empty($img)) {
            if (file_exists(WWW_ROOT . 'files' . DS . $img)) {
                return $img;
            }
        }
        return 'sem_imagem.gif';
    }

    public function status($val = 0) {
        $d = [
            0 => ['type' => 'danger', 'text' => 'Inativo'],
            1 => ['type' => 'success', 'text' => 'Ativo'],
        ];
        return '<span class="label label-' . $d[$val]['type'] . '">' . $d[$val]['text'] . '</span>';
    }

    public function posicao($val = 0) {
        $d = [1 => 'Topo', 2 => 'Rodape', 3 => 'Lateral Esquerda', 4 => 'Lateral Direita'];
        return $d[$val];
    }

}
