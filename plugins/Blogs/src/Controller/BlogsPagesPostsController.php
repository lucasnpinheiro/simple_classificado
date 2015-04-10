<?php

namespace Blogs\Controller;

use Blogs\Controller\AppController;

/**
 * BlogsPagesPosts Controller
 *
 * @property \App\Model\Table\BlogsPagesPostsTable $BlogsPagesPosts
 */
class BlogsPagesPostsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BlogsPages', 'BlogsPosts']
        ];
        $this->set('blogsPagesPosts', $this->paginate($this->BlogsPagesPosts));
        $this->set('_serialize', ['blogsPagesPosts']);
    }

    /**
     * View method
     *
     * @param string|null $id Blogs Pages Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogsPagesPost = $this->BlogsPagesPosts->get($id, [
            'contain' => ['BlogsPages', 'BlogsPosts']
        ]);
        $this->set('blogsPagesPost', $blogsPagesPost);
        $this->set('_serialize', ['blogsPagesPost']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogsPagesPost = $this->BlogsPagesPosts->newEntity();
        if ($this->request->is('post')) {
            $blogsPagesPost = $this->BlogsPagesPosts->patchEntity($blogsPagesPost, $this->request->data);
            if ($this->BlogsPagesPosts->save($blogsPagesPost)) {
                $this->Flash->success('The blogs pages post has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blogs pages post could not be saved. Please, try again.');
            }
        }
        $blogsPages = $this->BlogsPagesPosts->BlogsPages->find('list', ['limit' => 200]);
        $blogsPosts = $this->BlogsPagesPosts->BlogsPosts->find('list', ['limit' => 200]);
        $this->set(compact('blogsPagesPost', 'blogsPages', 'blogsPosts'));
        $this->set('_serialize', ['blogsPagesPost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blogs Pages Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogsPagesPost = $this->BlogsPagesPosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogsPagesPost = $this->BlogsPagesPosts->patchEntity($blogsPagesPost, $this->request->data);
            if ($this->BlogsPagesPosts->save($blogsPagesPost)) {
                $this->Flash->success('The blogs pages post has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blogs pages post could not be saved. Please, try again.');
            }
        }
        $blogsPages = $this->BlogsPagesPosts->BlogsPages->find('list', ['limit' => 200]);
        $blogsPosts = $this->BlogsPagesPosts->BlogsPosts->find('list', ['limit' => 200]);
        $this->set(compact('blogsPagesPost', 'blogsPages', 'blogsPosts'));
        $this->set('_serialize', ['blogsPagesPost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blogs Pages Post id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogsPagesPost = $this->BlogsPagesPosts->get($id);
        if ($this->BlogsPagesPosts->delete($blogsPagesPost)) {
            $this->Flash->success('The blogs pages post has been deleted.');
        } else {
            $this->Flash->error('The blogs pages post could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
