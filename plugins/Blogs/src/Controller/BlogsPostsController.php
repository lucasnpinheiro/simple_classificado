<?php

namespace Blogs\Controller;

use Blogs\Controller\AppController;

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
        $this->set('blogsPosts', $this->paginate($this->BlogsPosts));
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
