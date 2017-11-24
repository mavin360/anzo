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
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController
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
		$this->Auth->allow(['index','subscribe','page']);
		$this->viewBuilder()->setLayout('front');
		$Settings= TableRegistry::get('Settings');
		$setting = $Settings->find()->first()->toArray();
        $this->set(compact('setting'));
	}
	 
    public function index()
    {
		 $Categories= TableRegistry::get('Categories');
		 $Gallery=TableRegistry::get('Galleries');
		 $allCategories = $Categories->find()->contain(['SubCategories'])->where(['Categories.status'=>'active'])->order(['Categories.sort_order'=>'asc'])->toArray();
		 $homeSlider=$Gallery->find()->contain(['GalleryImages'])->where(['Galleries.status'=>'active','Galleries.is_home'=>'yes'])->first();
		 //pr($homeSlider->toArray());
		 $this->set(compact('allCategories','homeSlider'));
    }
	
	public function subscribe()
	{
		$this->autoRender =false ;
		$subscription= TableRegistry::get('Subscriptions');
		$subs=$subscription->newEntity();
		if($this->request->data){
			$this->request->data['added_date']=date('Y-m-d H:i:s');
			$subs = $subscription->patchEntity($subs, $this->request->getData());
			 if ($subscription->save($subs)){
                        $out=['type'=>'success','msg'=>'Thanks, Sign up for email updates'];
                }else{
					$errArr=$subs->errors();
					foreach($errArr as $key=>$val){
						if(isset($val['email'])){
							$errArrs=$val['email'];
						}
						if(isset($val['_isUnique'])){
							$errArrs=$val['_isUnique'];
						}
					}
                    $out=['type'=>'error','msg'=>$errArrs];
                }
		}else{
			$out=['type'=>'error','msg'=>'NO data'];
		}
		echo json_encode($out);
	}
	
	public function page($slug){
		//echo $slug;
		if($slug){
			$Pages= TableRegistry::get('Pages');
			$page=$Pages->find()->contain(['Sections'])->where(['Pages.page_slug'=>$slug,'Pages.status'=>'active'])->first();
		}
		if($page){
			$this->set(compact('page','page'));
		}else{
			return $this->redirect(['action' => 'index']);
		}
		 
	}
}
