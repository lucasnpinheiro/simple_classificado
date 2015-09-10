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
            'group' => 'Produtos.categoria_id',
            'order' => ['rand()'],
            'limit' => 6,
        ];
        $this->set('produtos_titulo', '&nbsp;');
        $this->paginate = $options;
        $this->set('produtos', $this->paginate($this->Produtos));
        $this->set('_serialize', ['produtos']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function categoria() {
        $options = [
            'contain' => ['Categorias'],
            'conditions' => ['Produtos.status' => 1],
            'limit' => 12,
            'order' => ['nome' => 'DESC']
        ];
        $options['conditions']['Produtos.categoria_id'] = $this->request->query['categoria'];
        $this->loadModel('Categorias');
        $find = $this->Categorias->get($this->request->query['categoria']);
        $this->set('produtos_titulo', $find->nome);
        $this->set('title', 'Categoria - ' . $find->nome);
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
        $this->loadModel('PedidosProdutos');
        $pedidosProduto = $this->PedidosProdutos->newEntity();
        $produto = $this->Produtos->get($id, [
            'contain' => ['Categorias']
        ]);
        $this->set('produto', $produto);
        $this->set('pedidosProduto', $pedidosProduto);
        $this->set('_serialize', ['produto', 'pedidosProduto']);
        $this->set('title', 'Produto - ' . $produto->nome);
    }

}
