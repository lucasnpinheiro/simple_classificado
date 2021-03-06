<?php


namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

/**
 * Configuracoes Controller
 *
 * @property \Configuracoes\Model\Table\ConfiguracoesTable $Configuracoes
 */
class ConfiguracoesController extends AppAdminController {

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
                if (is_array($value)) {
                    if (count($value) > 0 AND $value['name'] != '') {
                        $extension = explode('/', $value['type']);
                        if ($this->upload(NULL, NULL, $key, str_replace('.', '_', $find->chave) . '.' . $extension[1])) {
                            $find->value = (isset($this->request->data[$key]) ? $this->request->data[$key] : null);
                            $this->Configuracoes->save($find);
                        }
                    }
                } else {
                    $find->value = $value;
                    $this->Configuracoes->save($find);
                }

                unset($find);
            }
            //return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('configuracao'));
    }

}
