<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[] paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
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
		$module_list=[''=>'Select Module','gallery'=>'Gallery','job'=>'Job','stores'=>'Store Locations'];
		$this->set('modules',$module_list);
	}
	 
    public function index()
    {
        $pages = $this->paginate($this->Pages);
        $this->set(compact('pages'));
        $this->set('_serialize', ['pages']);
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id,[
            'contain' => ['Sections']
        ]);

        $this->set('page', $page);
        $this->set('_serialize', ['page']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$pages= TableRegistry::get('Pages');
        $page = $pages->newEntity();
        if ($this->request->is('post')) {
			
			if(!empty($this->request->data['pageSections'])){
				$temp=$this->request->data['pageSections']['section_title'];
			}
			if(!empty($this->request->data['page_header_image']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['page_header_image'],700,500,250,200,'PagesImages');
				$this->request->data['page_header_image']=$uploadImage;
			}else{
				$this->request->data['page_header_image']='';
			}
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
            $page = $pages->patchEntity($page, $this->request->getData());
			
            if ($pages->save($page)) {
				if(!empty($temp)){
				$sections= TableRegistry::get('Sections');
					foreach($temp as $key=>$val){
						$data['section_title']=$val;
						$data['section_text']=$this->request->data['pageSections']['section_text'][$key];
						$data['page_id']=$page->id;
						$data['added_date']=date('Y-m-d H:i:s');
						$data['modify_date']=date('Y-m-d H:i:s');
						$secData[]=$data;
						$section=$sections->newEntity();
						$section=$sections->patchEntity($section,$data);
						$sections->save($section);
					}
				}
                $this->Flash->success(__('The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{
				 $error=$page->errors();
				 $this->Flash->error(__($error));
			}
           // $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }
		$galleries= TableRegistry::get('Galleries');
		$allGalleries=$galleries->find('list',['keyField' => 'id','valueField' =>'gallery_name','limit' => 200])->where(['Galleries.is_home !='=>'yes','Galleries.status'=>'active'])->toArray();
        $this->set(compact('page','allGalleries'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => ['Sections']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			if(!empty($this->request->data['pageSections'])){
				$temp=$this->request->data['pageSections']['section_title'];
			}
			if(!empty($this->request->data['page_header_image_new']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['page_header_image_new'],700,500,250,200,'PagesImages');
				//$this->Image->delete_image($this->request->data['page_header_image'],'PagesImages');
				$this->request->data['page_header_image']=$uploadImage;
			}
			
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $page = $this->Pages->patchEntity($page, $this->request->getData());
			
            if ($this->Pages->save($page)) {
				if(!empty($temp)){
				$sections= TableRegistry::get('Sections');
				$sections->deleteAll(['page_id'=>$id]);
					foreach($temp as $key=>$val){
						$data['section_title']=$val;
						$data['section_text']=$this->request->data['pageSections']['section_text'][$key];
						$data['page_id']=$id;
						$data['added_date']=date('Y-m-d H:i:s');
						$data['modify_date']=date('Y-m-d H:i:s');
						$secData[]=$data;
						$section=$sections->newEntity();
						$section=$sections->patchEntity($section,$data);
						$sections->save($section);
					}
				}
				
                $this->Flash->success(__('The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }
		$galleries= TableRegistry::get('Galleries');
		$allGalleries=$galleries->find('list',['keyField' => 'id','valueField' =>'gallery_name','limit' => 200])->where(['Galleries.is_home !='=>'yes','Galleries.status'=>'active'])->toArray();
        $this->set(compact('page','allGalleries'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
			$sections= TableRegistry::get('Sections');
			$sections->deleteAll(['page_id'=>$id]);
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function allGalleries(){
		$galleries= TableRegistry::get('Galleries');
		$allGalleries=$galleries->find('list',['keyField' => 'id','valueField' =>'gallery_name','limit' => 200])->toArray();
		echo json_encode($allGalleries);
		die;
	}
}
