<?php

namespace Configuracoes\Controller\Admin;

use Configuracoes\Controller\AppController;

/**
 * Configuracoes Controller
 *
 * @property \Configuracoes\Model\Table\ConfiguracoesTable $Configuracoes
 */
class ConfiguracoesController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $configuracao = $this->Configuracoes->newEntity();
        $this->set('configuracoes', $this->Configuracoes->find('all', ['conditions' => ['Configuracoes.status' => 1]]));
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($this->request->data as $key => $value) {
                $find = $this->Configuracoes->get($key);
                $find->value = $value;
                $this->Configuracoes->save($find);
                unset($find);
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('configuracao'));
    }

}
