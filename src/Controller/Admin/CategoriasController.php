<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class CategoriasController extends AppAdminController {

    public $presetVars = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
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
            'order' => ['Categorias.nome' => 'ASC'],
            'conditions' => $this->Prg->parsedParams()
        ];
        $this->paginate = $options;
        $categorias = $this->paginate($this->Categorias);

        $categoria = $this->Categorias->newEntity();
        $this->set(compact('categorias', 'categoria'));
        $this->set('_serialize', ['categorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $categoria = $this->Categorias->get($id, [
            'contain' => ['Produtos']
        ]);
        $this->set('categoria', $categoria);
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            if ($this->upload(250)) {
                $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
                if ($this->Categorias->save($categoria)) {
                    $this->Flash->success('The categoria has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The categoria could not be saved. Please, try again.');
                }
            }
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->upload(250)) {
                $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
                if ($this->Categorias->save($categoria)) {
                    $this->Flash->success('The categoria has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The categoria could not be saved. Please, try again.');
                }
            }
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success('The categoria has been deleted.');
        } else {
            $this->Flash->error('The categoria could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
