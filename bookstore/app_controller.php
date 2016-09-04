<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {

	var $components = array('Session', 'RequestHandler');
	var $helpers = array('Time', 'Session', 'Html', 'Form');

	function beforeFilter() {
		$this->authenticate();			
	}

	function authenticate() {
		Configure::load('app_config');
		$allows = Configure::read('Login.Allow');
		$currentmethod = $this->params['action'] ; 
		$currentController = $this->params['controller'];
			if(!$this->Session->read('Auth.User')) {
				$this->Session->destroy();
				if(!in_array('all', $allows)) {
					if(($currentmethod != 'login') && (!in_array($currentmethod, $allows[$currentController]))) {
						$this->Session->write('referer', $this->referer());
						$this->redirect(array('controller' => 'users', 'action' => 'login'));
					}
				}
			}
		return true;
	}
	
	function beforeRender() {
		Configure::load('app_config');
		$menus = Configure::read('Menu');
		$this->set(compact('menus'));
		
		if(!$this->Session->check('Setting.Company.info')) {
			$this->loadModel('Setting');
			$companyInfo = $this->Setting->find('all', array('conditions' => array(
																				'Setting.attribute' => array(
																										 'stockLimit',
																										 'CompanyTitle', 
																										 'CompanyAdressStreet', 
																										 'CompanyAdressLocation', 
																										 'CompanyContactPhone', 
																										 'CompanyContactMobile'
																									)
																			
																			)
														)
										);
					$settings = '';					
					foreach($companyInfo as $setting) {
						$settings[$setting['Setting']['attribute']] = $setting['Setting']['value'];
					}
			$this->Session->write('Setting.Company.info', $settings);
		}
		$companyInfos = $this->Session->read('Setting.Company.info');
		$this->set(compact('companyInfos'));
		
		
		
	}
}
