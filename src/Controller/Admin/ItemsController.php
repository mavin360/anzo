<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[] paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
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
	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'SubCategories']
        ];
        $items = $this->paginate($this->Items);

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Categories', 'SubCategories']
        ]);

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
			//pr($this->request->data);die;
			if(!empty($this->request->data['product_image']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['product_image'],700,500,500,500,'ProductsImages');
				$this->request->data['product_image']=$uploadImage;
			}else{
				$this->request->data['product_image']='';
			}
			
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
		
		$categories = $this->Items->Categories->find('list',['keyField' => 'id','valueField' =>'category_title','limit' => 200])->toArray();
        $this->set(compact('item', 'categories'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			if(!empty($this->request->data['product_image_new']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['product_image_new'],700,500,500,500,'ProductsImages');
				//$this->Image->delete_image($this->request->data['product_image'],'ProductsImages');
				$this->request->data['product_image']=$uploadImage;
			}
			
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $categories = $this->Items->Categories->find('list',['keyField' => 'id','valueField' =>'category_title','limit' => 200])->toArray();
        $subCategories = $this->Items->SubCategories->find('list', ['keyField' => 'id','valueField' =>'sub_category_title','limit' => 200])->where(['category_id'=>$item->category_id])->toArray();
        $this->set(compact('item', 'categories', 'subCategories'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function findsubcategories($catId=null)
	{
		$catId=$this->request->data['cat_id'];
		if(!empty($catId)){
			$subCategories = $this->Items->SubCategories->find('list', ['keyField' => 'id','valueField' =>'sub_category_title','limit' => 200])->where(['category_id'=>$catId])->toArray();
			if(!empty($subCategories)){
				$out='';
				foreach($subCategories as $key=>$value){
					$out.="<option value='{$key}'>{$value}</option>";
				}
			}else{
				$out='<option value="">No Sub Category</option>';
			}
			
			echo json_encode(['data'=>$out]);
		}
		die;
	}
}
