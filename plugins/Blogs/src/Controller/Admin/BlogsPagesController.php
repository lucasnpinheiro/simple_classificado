<?php

namespace Blogs\Controller\Admin;

use Blogs\Controller\AppController;

/**
 * BlogsPages Controller
 *
 * @property \App\Model\Table\BlogsPagesTable $BlogsPages
 */
class BlogsPagesController extends AppController {

    public $presetVars = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'apelido' => ['type' => 'like'],
        'template' => ['type' => 'like'],
        'status' => ['type' => 'value'],
        'inicial' => ['type' => 'value'],
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
        $this->Prg->commonProcess();
        $options = [
            'conditions' => $this->Prg->parsedParams()
        ];
        $this->paginate = $options;
        $blogsPages = $this->paginate($this->BlogsPages);

        $blogsPage = $this->BlogsPages->newEntity();
        $this->set(compact('blogsPages', 'blogsPage'));
        $this->set('_serialize', ['blogsPages']);
    }

    /**
     * View method
     *
     * @param string|null $id Blogs Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $blogsPage = $this->BlogsPages->get($id, [
            'contain' => []
        ]);
        $this->set('blogsPage', $blogsPage);
        $this->set('_serialize', ['blogsPage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $blogsPage = $this->BlogsPages->newEntity();
        if ($this->request->is('post')) {
            $blogsPage = $this->BlogsPages->patchEntity($blogsPage, $this->request->data);
            if ($this->BlogsPages->save($blogsPage)) {
                $this->Flash->success('The blogs page has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blogs page could not be saved. Please, try again.');
            }
        }
        $this->set(compact('blogsPage'));
        $this->set('_serialize', ['blogsPage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blogs Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $blogsPage = $this->BlogsPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogsPage = $this->BlogsPages->patchEntity($blogsPage, $this->request->data);
            if ($this->BlogsPages->save($blogsPage)) {
                $this->Flash->success('The blogs page has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blogs page could not be saved. Please, try again.');
            }
        }
        $this->set(compact('blogsPage'));
        $this->set('_serialize', ['blogsPage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blogs Page id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $blogsPage = $this->BlogsPages->get($id);
        if ($this->BlogsPages->delete($blogsPage)) {
            $this->Flash->success('The blogs page has been deleted.');
        } else {
            $this->Flash->error('The blogs page could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}