<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * BlogsPosts Controller
 *
 * @property \App\Model\Table\BlogsPostsTable $BlogsPosts
 */
class BlogsPostsController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('blogsPosts', $this->paginate($query));
        $this->set('_serialize', ['blogsPosts']);
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

}
