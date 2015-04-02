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
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
use Cake\Database\Type;

// Habilita o parseamento de datas localizadas
Type::build('date')->useLocaleParser()->setLocaleFormat('dd/MM/yyyy');
Type::build('datetime')->useLocaleParser()->setLocaleFormat('dd/MM/yyyy HH:mm:ss');
Type::build('timestamp')->useLocaleParser()->setLocaleFormat('dd/MM/yyyy HH:mm:ss');

// Habilita o parseamento de decimal localizaddos
Type::build('decimal')->useLocaleParser();
Type::build('float')->useLocaleParser();

class AppController extends Controller {

    public $helpers = [
        'Html' => [
            'className' => 'Bootstrap3.BootstrapHtml'
        ],
        'Form' => [
            'className' => 'Bootstrap3.BootstrapForm'
        ],
        'Paginator' => [
            'className' => 'Bootstrap3.BootstrapPaginator'
        ],
        'Modal' => [
            'className' => 'Bootstrap3.BootstrapModal'
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
            'logoutRedirect' => [
                'controller' => 'Produtos',
                'action' => 'index'
            ],
            'authorize' => ['controller'],
            'authenticate' => [
                'Form' => [
                    'passwordHasher' => [
                        'className' => 'Default',
                    ],
                    'fields' => ['username' => 'email', 'password' => 'senha'],
                    'userModel' => 'Usuarios',
                    'scope' => ['Usuarios.status' => 1],
                ]
            ]
        ]);
    }

    public function isAuthorized($user) {
        // Admin can access every action
        //if (isset($user['role']) && $user['role'] === 'admin') {
        return true;
        //}
        // Default deny
        //return false;
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        if (isset($this->request->params['prefix']) AND $this->request->params['prefix'] == 'admin') {
            $this->layout = 'admin';
            $this->Auth->allow();
        } else {
            $this->Auth->allow();
        }
    }

}
