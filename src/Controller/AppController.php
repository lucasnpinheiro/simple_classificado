<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Database\Type;
use Cake\I18n\I18n;

// Habilita o parseamento de datas localizadas
Type::build('date')->useLocaleParser()->setLocaleFormat('dd/M/yyyy');
Type::build('datetime')->useLocaleParser()->setLocaleFormat('dd/M/yyyy HH:ii:ss');
Type::build('timestamp')->useLocaleParser()->setLocaleFormat('dd/M/yyyy HH:ii:ss');

// Habilita o parseamento de decimal localizaddos
Type::build('decimal')->useLocaleParser();
Type::build('float')->useLocaleParser();
I18n::locale('pt_BR');

class AppController extends Controller {

    public $helpers = [
        'Html' => [
            'className' => 'MyHtml'
        ],
        'Form' => [
            'className' => 'MyForm'
        ],
        'Paginator' => [
            'className' => 'MyPaginator'
        ],
        'Modal' => [
            'className' => 'MyModal'
        ],
        'Pinheiro',
        'Text',
        'Url'
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Cookie');
        $this->loadComponent('Flash');
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Usuarios',
                'action' => 'index',
                'prefix' => 'admin',
            ],
            'loginAction' => [
                'controller' => 'Usuarios',
                'action' => 'login',
                'plugin' => null
            ],
            'logoutRedirect' => '/',
            'authorize' => ['controller'],
            'authenticate' => [
                'Form' => [
                    'passwordHasher' => [
                        'className' => 'Default',
                    ],
                    'fields' => ['username' => 'email', 'password' => 'senha'],
                    'userModel' => 'Usuarios',
                    'scope' => ['status' => 1],
                ]
            ]
        ]);
    }

    public function isAuthorized($user) {
        return true;
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        if (isset($this->request->params['prefix']) AND $this->request->params['prefix'] == 'admin') {
            $this->Auth->allow();
        } else {
            $this->Auth->allow();
        }
    }

    public function upload($width = null, $height = null, $_fileName = 'foto', $custom_name = null) {
        if (count($this->request->data[$_fileName]) > 0) {
            $this->loadComponent('Upload');
            if (!is_null($custom_name)) {
                $this->Upload->custom_name($custom_name);
            }
            $up = $this->Upload->run($this->request->data[$_fileName]);
            if ($up === 0) {
                $this->Flash->error(implode('<br />', $this->Upload->error));
                return FALSE;
            } else if ($up === 1) {
                if (!is_null($width)) {
                    if (is_null($height)) {
                        $info = getimagesize($this->Upload->destination . $this->Upload->filename);
                        $__width = $info[0] / $width;
                        $__height = $info[1] / $__width;
                        $height = $__height;
                    }
                    $this->loadComponent('SimpleImage');
                    $file = $this->SimpleImage->init($this->Upload->destination . $this->Upload->filename)->thumbnail($width, $height)->save($this->Upload->destination . $this->Upload->filename);
                    $this->request->data[$_fileName] = $this->Upload->filename;
                } else {
                    $this->request->data[$_fileName] = $this->Upload->filename;
                }
            } else {
                unset($this->request->data[$_fileName]);
            }
        } else {
            unset($this->request->data[$_fileName]);
        }
        return true;
    }

}
