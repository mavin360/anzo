<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
	 
	  public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Image');
	   $this->viewBuilder()->setLayout('admin');
	}
	 public $paginate = [
         'order' => [
            'Categories.sort_order' => 'asc'
        ]
    ];
	
    public function index()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   /* public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }*/

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
			/*if(!empty($this->request->data['category_image']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['category_image'],700,500,250,200,'CategoriesImages');
				$this->request->data['category_image']=$uploadImage;
			}else{
				$this->request->data['category_image']='';
			}*/
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
			
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			/*if(!empty($this->request->data['category_image_new']['name'])){
				$uploadDesktopImage=$this->Image->upload_image_and_thumbnail($this->request->data['category_image_new'],700,500,250,200,'CategoriesImages');
				$this->Image->delete_image($this->request->data['category_image'],'CategoriesImages');
				$this->request->data['category_image']=$uploadDesktopImage;
			}*/
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function listSubcategories()
    {
		$SubCategory= TableRegistry::get('SubCategories');
        $subCategories = $SubCategory->find()->contain(['Categories'])->order(['SubCategories.sort_order'=>'asc'])->toArray();
        $this->set(compact('subCategories'));
        $this->set('_serialize', ['subCategories']);
    }
	
	 public function addSubCategory()
    {
		$SubCategories= TableRegistry::get('SubCategories');
		$Categories= TableRegistry::get('Categories');
        $subCategory = $SubCategories->newEntity();
        if ($this->request->is('post')) {
			if(!empty($this->request->data['sub_category_image']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['sub_category_image'],700,500,250,200,'SubCategoriesImages');
				$this->request->data['sub_category_image']=$uploadImage;
			}else{
				$this->request->data['sub_category_image']='';
			}
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
			
            $subCategory = $SubCategories->patchEntity($subCategory, $this->request->getData());
            if ($SubCategories->save($subCategory)) {
                $this->Flash->success(__('The sub category has been saved.'));

                return $this->redirect(['action' => 'list_subcategories']);
            }
            $this->Flash->error(__('The sub category could not be saved. Please, try again.'));
        }
        $categories = $Categories->find('list',['keyField' => 'id','valueField' =>'category_title','limit' => 200])->toArray();
        $this->set(compact('subCategory', 'categories'));
        $this->set('_serialize', ['subCategory']);
    }
	
	public function editSubCategory($id = null)
    {
		$SubCategories= TableRegistry::get('SubCategories');
        $subCategory = $SubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			if($this->request->data['sub_category_image_new']['name']){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['sub_category_image_new'],700,500,250,200,'SubCategoriesImages');
				//$this->Image->delete_image($this->request->data['sub_category_image'],'SubCategoriesImages');
				$this->request->data['sub_category_image']=$uploadImage;
			}
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $subCategory = $SubCategories->patchEntity($subCategory, $this->request->getData());
            if ($SubCategories->save($subCategory)) {
                $this->Flash->success(__('The sub category has been saved.'));

                return $this->redirect(['action' => 'list_subcategories']);
            }
            $this->Flash->error(__('The sub category could not be saved. Please, try again.'));
        }
		$Categories= TableRegistry::get('Categories');
        $categories = $Categories->find('list',['keyField' => 'id','valueField' =>'category_title','limit' => 200])->toArray();
        $this->set(compact('subCategory', 'categories'));
        $this->set('_serialize', ['subCategory']);
    }
	
	public function deleteSubCategory($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$SubCategories= TableRegistry::get('SubCategories');
        $subCategory = $SubCategories->get($id);
        if ($SubCategories->delete($subCategory)) {
            $this->Flash->success(__('The sub category has been deleted.'));
        } else {
            $this->Flash->error(__('The sub category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'listSubcategories']);
    }
	
	public function allSubCategories($catId=null)
	{
		$SubCategory= TableRegistry::get('SubCategories');
		$Category= TableRegistry::get('Categories');
		$parentCategory=$Category->find()->where(['id'=>$catId])->toArray();
        $subCategories = $SubCategory->find()->contain(['Categories'])->where(['category_id'=>$catId])->toArray();;
        $this->set(compact('parentCategory','subCategories'));
        $this->set('_serialize', ['subCategories']);
	}
	
	public function deleteImg(){
		$SubCategory= TableRegistry::get('SubCategories');
		$id=$this->request->data['catId'];
		if($id){
			$subcatgory=$SubCategory->get($id);
			if($subcatgory->sub_category_image){
				$imgdel=$this->Image->delete_image($subcatgory->sub_category_image,'SubCategoriesImages');
				$this->request->data['sub_category_image']='';
				$subcatgory=$SubCategory->patchEntity($subcatgory, $this->request->getData());
				$SubCategory->save($subcatgory);
				$out=['type'=>'success'];
			}else{
				$out=['type'=>'error'];
			}
		}else{
			$out=['type'=>'error'];
		}
		echo json_encode($out);
		die;
	}
	
}
