<?php

namespace App\Controller\Admin;

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
        $this->paginate = [
            'contain' => ['Categorias']
        ];
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

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            if ($this->upload()) {
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
            if ($this->upload()) {
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

    private function upload() {
        if (count($this->request->data['foto']) > 0) {
            $this->loadComponent('Upload');
            if (!$this->Upload->run($this->request->data['foto'])) {
                $this->Flash->error(implode('<br />', $this->Upload->error));
                return FALSE;
            } else {
                $this->request->data['foto'] = $this->Upload->filename;
            }
        } else {
            unset($this->request->data['foto']);
        }
        return true;
    }

}
