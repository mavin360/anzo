<?php 
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class CategoryHelper extends Helper
{
	public $helpers = ['Html'];
	public function TabItemList($indx=null,$catId,$show_no){
		$SubCategories= TableRegistry::get('SubCategories');
		$Items=TableRegistry::get('Items');
		$allItems=$Items->allItems($catId);
		if($allItems){
			return $this->_View->element('tab',['data'=>$allItems,'show_no'=>$show_no]);
		}
	}
	
}