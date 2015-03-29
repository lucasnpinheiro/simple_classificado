<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Banners Controller
 *
 * @property \App\Model\Table\BannersTable $Banners
 */
class BannersController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('banners', $this->paginate($this->Banners));
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
            if ($this->upload()) {
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
            if ($this->upload()) {
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
