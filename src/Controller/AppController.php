<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
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
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
 
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
 
        $this->loadComponent('Auth', [
            //ログイン後は以下にリダイレクトかかる
            'loginRedirect' => [
                'controller' => 'Memos',
                'action' => 'index'
            ],
            //ログアウト後は以下にリダイレクトかかる
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            //認証ハンドラ
            'authenticate' => [
                'Form' => [
                  'userModel' => 'Users',
                  'fields' => [
                    'username' => 'username',
                    'password' => 'password'
                  ]
                ]
            ],
        ]);
 
        //ログインしてなくても以下２つはアクセスできる
        $this->Auth->allow(['login','add']);
 
 
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

}
