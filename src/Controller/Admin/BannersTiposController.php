<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BannersTipos Controller
 *
 * @property \App\Model\Table\BannersTiposTable $BannersTipos
 */
class BannersTiposController extends AppController {

    public $presetVars = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'descricao' => ['type' => 'like'],
        'altura' => ['type' => 'value'],
        'largura' => ['type' => 'value'],
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
        $bannersTipos = $this->paginate($this->BannersTipos);

        $bannersTipo = $this->BannersTipos->newEntity();
        $this->set(compact('bannersTipos', 'bannersTipo'));
        $this->set('_serialize', ['bannersTipos']);
    }

    /**
     * View method
     *
     * @param string|null $id Banners Tipo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $bannersTipo = $this->BannersTipos->get($id, [
            'contain' => []
        ]);
        $this->set('bannersTipo', $bannersTipo);
        $this->set('_serialize', ['bannersTipo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $bannersTipo = $this->BannersTipos->newEntity();
        if ($this->request->is('post')) {
            $bannersTipo = $this->BannersTipos->patchEntity($bannersTipo, $this->request->data);
            if ($this->BannersTipos->save($bannersTipo)) {
                $this->Flash->success('The banners tipo has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The banners tipo could not be saved. Please, try again.');
            }
        }
        $this->set(compact('bannersTipo'));
        $this->set('_serialize', ['bannersTipo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Banners Tipo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $bannersTipo = $this->BannersTipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bannersTipo = $this->BannersTipos->patchEntity($bannersTipo, $this->request->data);
            if ($this->BannersTipos->save($bannersTipo)) {
                $this->Flash->success('The banners tipo has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The banners tipo could not be saved. Please, try again.');
            }
        }
        $this->set(compact('bannersTipo'));
        $this->set('_serialize', ['bannersTipo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Banners Tipo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $bannersTipo = $this->BannersTipos->get($id);
        if ($this->BannersTipos->delete($bannersTipo)) {
            $this->Flash->success('The banners tipo has been deleted.');
        } else {
            $this->Flash->error('The banners tipo could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
