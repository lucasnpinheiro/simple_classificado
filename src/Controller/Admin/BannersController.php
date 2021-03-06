<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

/**
 * Banners Controller
 *
 * @property \App\Model\Table\BannersTable $Banners
 */
class BannersController extends AppAdminController {

    public $bannerDimmesion = ['1' => [1024, 200], '2' => [1024, 200], '4' => [250, 300]];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('banners', $this->paginate($query));
        $this->set('_serialize', ['banners']);
    }

    /**
     * View method
     *
     * @param string|null $id Banner id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $banner = $this->Banners->get($id, [
            'contain' => []
        ]);
        $this->set('banner', $banner);
        $this->set('_serialize', ['banner']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $banner = $this->Banners->newEntity();
        if ($this->request->is('post')) {
            $p = $this->bannerDimmesion[$this->request->data['posicao']];
            if ($this->upload($p[0], $p[1])) {
                $banner = $this->Banners->patchEntity($banner, $this->request->data);
                if ($this->Banners->save($banner)) {
                    $this->Flash->success('The banner has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The banner could not be saved. Please, try again.');
                }
            }
        }
        $this->set(compact('banner'));
        $this->set('_serialize', ['banner']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Banner id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $banner = $this->Banners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $p = $this->bannerDimmesion[$this->request->data['posicao']];
            if ($this->upload($p[0], $p[1])) {
                $banner = $this->Banners->patchEntity($banner, $this->request->data);
                if ($this->Banners->save($banner)) {
                    $this->Flash->success('The banner has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The banner could not be saved. Please, try again.');
                }
            }
        }
        $this->set(compact('banner'));
        $this->set('_serialize', ['banner']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Banner id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        if ($this->Banners->delete($banner)) {
            $this->Flash->success('The banner has been deleted.');
        } else {
            $this->Flash->error('The banner could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
