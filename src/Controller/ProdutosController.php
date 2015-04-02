<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $options = [
            'contain' => ['Categorias'],
            'conditions' => ['Produtos.status' => 1],
            'limit' => 12,
            'order' => ['nome' => 'DESC']
        ];
        if (isset($this->request->query['categoria']) and ! empty($this->request->query['categoria'])) {
            $options['conditions']['Produtos.categoria_id'] = $this->request->query['categoria'];
            $this->loadModel('Categorias');
            $find = $this->Categorias->get($this->request->query['categoria']);
            $this->set('produtos_titulo', $find->nome);
        } else {
            $options['order'] = ['rand()'];
            $this->set('produtos_titulo', 'Produtos');
        }

        $this->paginate = $options;
        $this->set('produtos', $this->paginate($this->Produtos));
        $this->set('_serialize', ['produtos']);
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Categorias']
        ]);
        $this->set('produto', $produto);
        $this->set('_serialize', ['produto']);
    }

}
