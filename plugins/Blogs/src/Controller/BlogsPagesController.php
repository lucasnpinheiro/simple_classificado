<?php

namespace Blogs\Controller;

use Blogs\Controller\AppController;

/**
 * BlogsPages Controller
 *
 * @property \App\Model\Table\BlogsPagesTable $BlogsPages
 */
class BlogsPagesController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('blogsPages', $this->paginate($this->BlogsPages));
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

}
