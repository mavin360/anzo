<?php
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
namespace App\Controller\Admin;
use App\Controller\AppController;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController
{


    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
	 public function initialize()
{
    parent::initialize();
    // Add the 'add' action to the allowed actions list.
    //$this->Auth->allow(['signup']);
	
}
	 
	 
    public function index()
    {
		$this->viewBuilder()->setLayout('admin');
		//pr($this->Auth->user());
		
    }
	public function signup()
    {
		$this->viewBuilder()->setLayout('login');
		$user = $this->Users->newEntity($this->request->getData());
		if ($this->Users->save($user)) {
			//$this->Auth->setUser($user->toArray());
			return $this->redirect([
				'controller' => 'Users',
				'action' => 'signin'
			]);
		}
		
    }
	public function signin()
    {
		
		if($this->Auth->user()){
			return $this->redirect([
				'controller' => 'Dashboard',
				'action' => 'index'
			]);
		}
		$this->viewBuilder()->setLayout('login');
		if ($this->request->is('post')) {	
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->referer());
			}
			$this->Flash->error(__('Email or password is incorrect.'),['key'=>'error']);
		}
    }
	
	public function logout()
    {
		return $this->redirect($this->Auth->logout());
    }
	
	public function profile(){
		$this->viewBuilder()->setLayout('admin');
		$user = $this->Users->newEntity();
		$this->set(compact('user'));
	}
	
	function userFieldEdit(){
		$id=$this->request->data['pk'];
		$user = $this->Users->get($id);
		if(!empty($this->request->data['value'])){
			$this->request->data[$this->request->data['name']]=$this->request->data['value'];
			$this->request->data['user_modified_date ']=date('Y-m-d H:i:s');
			unset($this->request->data['value']);
			unset($this->request->data['name']);
			unset($this->request->data['pk']);
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$user = $this->Users->get($id);
				$this->Auth->setUser($user);
			}
		}
		die;
	}
	
	function changePass(){
		$id=$this->Auth->user('id');
		$this->request->data['password'];
		//echo $this->request->data['password'];
		if(empty($this->request->data['password'])){
			echo json_encode(['type'=>'error','msg'=>'Enter required field(s).']);
			die;
		}
		if(empty($this->request->data['re_password'])){
			echo json_encode(['type'=>'error','msg'=>'Enter required field(s).']);
			die;
		}
		if($this->request->data['password']!=$this->request->data['re_password']){
			echo json_encode(['type'=>'error','msg'=>'Both password do\'nt match.']);
			die;
		}else{
			$user = $this->Users->get($id);
			$this->request->data['user_modified_date ']=date('Y-m-d H:i:s');
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				echo json_encode(['type'=>'success','msg'=>'User password changed.']);
			}
		}
		die;
	}
}
