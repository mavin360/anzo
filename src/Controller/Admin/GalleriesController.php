<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Galleries Controller
 *
 * @property \App\Model\Table\GalleriesTable $Galleries
 *
 * @method \App\Model\Entity\Gallery[] paginate($object = null, array $settings = [])
 */
class GalleriesController extends AppController
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
		$this->loadComponent('Paginator');
	   $this->viewBuilder()->setLayout('admin');
	}
	 
    public function index()
    {
        $galleries = $this->paginate($this->Galleries);

        $this->set(compact('galleries'));
        $this->set('_serialize', ['galleries']);
    }

    /**
     * View method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => []
        ]);

        $this->set('gallery', $gallery);
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gallery = $this->Galleries->newEntity();
        if ($this->request->is('post')) {
			if(!empty($this->request->data['image']['name'])){
				//$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['image'],700,500,250,200,'GalleriesImages');
				//$this->request->data['image']=$uploadImage;
			}else{
				//$this->request->data['image']='';
			}
			
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($gallery)) {
				if($this->request->data['is_home']=='yes'){
					$this->Galleries->query()->update()->set(['is_home' =>'no'])->where(['is_home' =>'yes'])->execute();
					$this->Galleries->query()->update()->set(['is_home' =>'yes'])->where(['id' =>$gallery->id])->execute();
				}
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('gallery'));
        $this->set('_serialize', ['gallery']);
    }
	public function imageIndex($gid=null){
		$galleryImage= TableRegistry::get('GalleryImages');
		$galleryImages = $galleryImage->find('all')->contain(['Galleries'])->where(['GalleryImages.gallery_id'=>$gid]);
		
		$galleryImages = $this->Paginator->paginate($galleryImages,['order' =>['id' => 'desc']]);

        $this->set(compact('galleryImages','gid'));
        $this->set('_serialize', ['galleryImages']);
	}
	
	
	public function addImage($gid){
		if($gid){
			$galleryImage = $this->Galleries->GalleryImages->newEntity();
        if ($this->request->is('post')) {
			if(!empty($this->request->data['image']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['image'],700,500,250,200,'GalleriesImages');
				$this->request->data['image']=$uploadImage;
			}else{
				$this->request->data['image']='';
			}
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
            $galleryImage = $this->Galleries->GalleryImages->patchEntity($galleryImage, $this->request->getData());
            if ($this->Galleries->GalleryImages->save($galleryImage)) {
                $this->Flash->success(__('The Image has been saved.'));

                return $this->redirect(['action' => 'image_index',$gid]);
            }
            $this->Flash->error(__('The Image could not be saved. Please, try again.'));
        }
		}else{
			 return $this->redirect(['action' => 'index']);
		}
		$galleries = $this->Galleries->find('list',['keyField' => 'id','valueField' =>'gallery_name','limit' => 200])->toArray();
		$this->set(compact('galleries','gid'));
		$this->set(compact('galleryImage'));
		$this->set('_serialize', ['galleryImage']);
	}
	
	public function deleteImage($id = null){
		$this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->GalleryImages->get($id);
        if ($this->Galleries->GalleryImages->delete($gallery)) {
            $this->Flash->success(__('The gallery image has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery image could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'image_index',$gallery['gallery_id']]);
	}

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			if(!empty($this->request->data['image_new']['name'])){
				//$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['image_new'],700,500,250,200,'GalleriesImages');
				//$this->Image->delete_image($this->request->data['image'],'GalleriesImages');
				//$this->request->data['image']=$uploadImage;
			}
			if($this->request->data['is_home']=='yes'){
				$this->Galleries->query()->update()->set(['is_home' =>'no'])->where(['is_home' =>'yes'])->execute();
				$this->Galleries->query()->update()->set(['is_home' =>'yes'])->where(['id' =>$id])->execute();
			}
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('gallery'));
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            $this->Flash->success(__('The gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
