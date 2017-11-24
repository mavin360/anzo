<?php 
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class AnzoHelper extends Helper
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
	
	public function PageModule($module=null,$moduleId=null){
		//echo $module;
		if($module=='gallery'){
			$Galleries= TableRegistry::get('Galleries');
			$allGalleryImage=$Galleries->find()->contain(['GalleryImages'])->where(['Galleries.id'=>$moduleId,'Galleries.status'=>'active','Galleries.gallery_option !='=>'header_gallery'])->first();
			if($allGalleryImage){
				return $this->_View->element('gallery',['data'=>$allGalleryImage]);
			}
		}else if($module=='stores'){
			$StoreLocations= TableRegistry::get('StoreLocations');
			$allLocations=$StoreLocations->locationByCity();
			return $this->_View->element('location',['data'=>$allLocations]);
		}else if($module=='job'){
			$Jobs= TableRegistry::get('Jobs');
			$JobCategories= TableRegistry::get('JobCategories');
			$allJobCategory=$JobCategories->find();
			return $this->_View->element('job',['data'=>'']);
		}
	
	}
	public function HeaderModule($id){
		if($id){
			$Pages= TableRegistry::get('Pages');
			$page=$Pages->find()->contain(['Sections'])->where(['Pages.id'=>$id,'Pages.status'=>'active'])->first();
			if($page['selected_module']=='gallery'){
				$Gallery=TableRegistry::get('Galleries');
				$Slider=$Gallery->find()->contain(['GalleryImages'])->where(['Galleries.id'=>$page['module_id'],'Galleries.status'=>'active','Galleries.gallery_option'=>'header_gallery'])->first();
				if($Slider){
					return $this->_View->element('slider',['data'=>$Slider]);
				}else{
					return false;
				}
			}
		}
	}
	
}