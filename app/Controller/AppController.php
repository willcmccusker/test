<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );

	public  $components = array( 
		'Auth'=> array(
            'flash' => array(
                'element' => 'default',
                'key' => 'auth',
                'params' => array(
                    'class' => 'alert'
                )
            ),
            //login page
            'loginAction' => array(
            	'controller'=>'users',
            	'action'=>'login', 
            	'admin'=>true
            ),
            //after login
            'loginRedirect' => array( 
                'controller' => 'cities',
                'action' => 'index',
                'admin' => false
            ),
            //after logged out
            'logoutRedirect' => array( 
                'controller' => 'users',
                'action' => 'login',
                'admin'=> true  // add this so that admin actions get ignored
            ),
            'unauthorizedRedirect' => array(
                'controller'=> 'users',
                'action'=>'login',
                'admin'=>true
            ),
            'authError' => 'Access Denied',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller')
        )
    );



    function beforeFilter() {
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
        }elseif (isset($this->params['prefix']) && $this->params['prefix'] == 'API') {
        	$this->response->type('json');
            $this->layout = 'api';
        } 
    }

	public function isAuthorized($user) {
		return true;
	}


}
