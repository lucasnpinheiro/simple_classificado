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

    public $helpers = [
        'Html' => [
            'className' => 'MyHtml'
        ],
        'Form' => [
            'className' => 'MyForm'
        ],
        'Paginator' => [
            'className' => 'MyPaginator'
        ],
        'Modal' => [
            'className' => 'MyModal'
        ],
        'Number'
    ];

    public function __construct(View $View, $settings = []) {
        parent::__construct($View, $settings);
    }

    public function categorias() {
        $categorias = TableRegistry::get('Categorias');
        return $categorias->find('all')->where(['status' => 1]);
    }

    public function listaBanners($posicao = 1, $limit = 10) {
        $banners = TableRegistry::get('Banners');
        return $banners->find('all')->where(['status' => 1, 'posicao' => $posicao])->order('RAND()')->limit($limit);
    }

    public function moeda($number, $options = []) {
        if ($number > 0) {
            $default = ['before' => 'R$ ', 'precision' => 2, 'places' => 2, 'locale' => 'pt_BR'];
            $options = Hash::merge($default, $options);
            return $this->Number->format($number, $options);
        } else {
            return 'consultar';
        }
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
            2 => ['type' => 'primary', 'text' => 'Entregue'],
        ];
        return '<span class="label label-' . $d[$val]['type'] . '">' . $d[$val]['text'] . '</span>';
    }

    public function statusPagSeguro($val = 0) {
        $d = [
            0 => ['type' => 'info', 'text' => 'Pedido em aberto'],
            1 => ['type' => 'success', 'text' => 'Aguardando Pagamento'],
            2 => ['type' => 'primary', 'text' => 'Pago'],
            3 => ['type' => 'primary', 'text' => 'Cancelado'],
            4 => ['type' => 'primary', 'text' => 'Entregue'],
        ];
        return '<span class="label label-' . $d[$val]['type'] . '">' . $d[$val]['text'] . '</span>';
    }

    public function statusPagSeguroArray() {
        return [
            0 => 'Pedido em aberto',
            1 => 'Aguardando Pagamento',
            2 => 'Pago',
            3 => 'Cancelado',
            4 => 'Entregue',
        ];
    }

    public function posicao($val = 0) {
        $d = [1 => 'Topo', 2 => 'Rodape', 3 => 'Lateral Esquerda', 4 => 'Lateral Direita'];
        return $d[$val];
    }

}
