<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

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
	public $components = array(
		'DebugKit.Toolbar',
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
				'controller' => 'events',
				'action' => 'index'
			),
			'logoutRedirect' => array(
					'controller' => 'pages',
					'action' => 'display',
					'home'
			),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish'
				)
			)
		),
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}
	
	public function beforeRender() {
		// $this->assign('title', $this->request->controller . ' - ' . $this->request->action);
	}
}
