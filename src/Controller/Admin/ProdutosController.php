<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppAdminController {

    public $presetVars = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'descricao' => ['type' => 'like'],
        'valor' => ['type' => 'like'],
        'foto' => ['type' => 'like'],
        'categoria_id' => ['type' => 'value'],
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
        $this->Prg->commonProcess($this->name, ['action' => 'index']);
        $options = [
            'contain' => ['Categorias'],
            'order' => ['Produtos.modified' => 'DESC'],
            'conditions' => $this->Prg->parsedParams()
        ];
        $this->paginate = $options;
        $produtos = $this->paginate($this->Produtos);

        $produto = $this->Produtos->newEntity();
        $categorias = $this->Produtos->Categorias->find('list', ['fields' => ['Categorias.id', 'Categorias.nome']]);
        $this->set(compact('produtos', 'produto', 'categorias'));
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

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            if ($this->upload(800)) {
                $produto = $this->Produtos->patchEntity($produto, $this->request->data);
                if ($this->Produtos->save($produto)) {
                    $this->Flash->success('The produto has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The produto could not be saved. Please, try again.');
                }
            }
        }
        $categorias = $this->Produtos->Categorias->find('list', ['fields' => ['Categorias.id', 'Categorias.nome']]);
        $this->set(compact('produto', 'categorias'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $produto = $this->Produtos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->upload(800)) {
                $produto = $this->Produtos->patchEntity($produto, $this->request->data);
                if ($this->Produtos->save($produto)) {
                    $this->Flash->success('The produto has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The produto could not be saved. Please, try again.');
                }
            }
        }
        $categorias = $this->Produtos->Categorias->find('list', ['fields' => ['Categorias.id', 'Categorias.nome']]);
        $this->set(compact('produto', 'categorias'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success('The produto has been deleted.');
        } else {
            $this->Flash->error('The produto could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
