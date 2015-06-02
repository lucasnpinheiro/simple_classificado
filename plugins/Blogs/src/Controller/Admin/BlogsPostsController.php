<?php

namespace Blogs\Controller\Admin;

use Blogs\Controller\AppController;

/**
 * BlogsPosts Controller
 *
 * @property \App\Model\Table\BlogsPostsTable $BlogsPosts
 */
class BlogsPostsController extends AppController {

    public $presetVars = [
        'id' => ['type' => 'value'],
        'titulo' => ['type' => 'like'],
        'conteudo' => ['type' => 'like'],
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
        $this->Prg->commonProcess();
        $options = [
            'conditions' => $this->Prg->parsedParams()
        ];
        $this->paginate = $options;
        $blogsPosts = $this->paginate($this->BlogsPosts);

        $blogsPost = $this->BlogsPosts->newEntity();
        $this->set(compact('blogsPosts', 'blogsPost'));
        $this->set('_serialize', ['blogsPages']);
    }

    /**
     * View method
     *
     * @param string|null $id Blogs Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $blogsPost = $this->BlogsPosts->get($id, [
            'contain' => ['BlogsPagesPosts']
        ]);
        $this->set('blogsPost', $blogsPost);
        $this->set('_serialize', ['blogsPost']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $blogsPost = $this->BlogsPosts->newEntity();
        if ($this->request->is('post')) {
            $blogsPost = $this->BlogsPosts->patchEntity($blogsPost, $this->request->data);
            if ($this->BlogsPosts->save($blogsPost)) {
                $this->Flash->success('The blogs post has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blogs post could not be saved. Please, try again.');
            }
        }
        $this->set(compact('blogsPost'));
        $this->set('_serialize', ['blogsPost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blogs Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $blogsPost = $this->BlogsPosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogsPost = $this->BlogsPosts->patchEntity($blogsPost, $this->request->data);
            if ($this->BlogsPosts->save($blogsPost)) {
                $this->Flash->success('The blogs post has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blogs post could not be saved. Please, try again.');
            }
        }
        $this->set(compact('blogsPost'));
        $this->set('_serialize', ['blogsPost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blogs Post id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $blogsPost = $this->BlogsPosts->get($id);
        if ($this->BlogsPosts->delete($blogsPost)) {
            $this->Flash->success('The blogs post has been deleted.');
        } else {
            $this->Flash->error('The blogs post could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}