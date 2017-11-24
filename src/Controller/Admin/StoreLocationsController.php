<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * StoreLocations Controller
 *
 * @property \App\Model\Table\StoreLocationsTable $StoreLocations
 *
 * @method \App\Model\Entity\StoreLocation[] paginate($object = null, array $settings = [])
 */
class StoreLocationsController extends AppController
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
		//$this->paginate = ['contain' => ['StoreLocationDaysTimes']];
        $storeLocations = $this->paginate($this->StoreLocations);

        $this->set(compact('storeLocations'));
        $this->set('_serialize', ['storeLocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Store Location id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storeLocation = $this->StoreLocations->get($id, [
            'contain' => ['StoreLocationDaysTimes']
        ]);
		$allCountries=json_decode(file_get_contents('countries.json'),true);
		if($allCountries){
			$countryArr['']='';
			foreach($allCountries as $count){
				$countryArr[$count['name']]=$count['name'];
			}
		}
        $this->set('storeLocation', $storeLocation);
		$this->set(compact('countryArr'));
        $this->set('_serialize', ['storeLocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
		
        $storeLocation = $this->StoreLocations->newEntity();
        if ($this->request->is('post')) {
			if(!empty($this->request->data['store_image']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['store_image'],700,500,250,200,'StoresImages');
				$this->request->data['store_image']=$uploadImage;
			}else{
				$this->request->data['store_image']='';
			}
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
            $storeLocation = $this->StoreLocations->patchEntity($storeLocation, $this->request->getData());
            if ($this->StoreLocations->save($storeLocation)) {
				$data=$this->StoreLocations->StoreLocationDaysTimes->formatDayTimeData($this->request->data,$storeLocation->id);
				if($data){
					//$this->StoreLocations->StoreLocationDaysTimes->deleteAll(['store_location_id' => $storeLocation->id]);
					foreach($data as $tdata){
						$timeData=$this->StoreLocations->StoreLocationDaysTimes->newEntity();
						$timedata=$this->StoreLocations->StoreLocationDaysTimes->patchEntity($timeData,$tdata);
						$this->StoreLocations->StoreLocationDaysTimes->save($timedata);
					}
				}
                $this->Flash->success(__('The store location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store location could not be saved. Please, try again.'));
        }
		$allCountries=json_decode(file_get_contents('countries.json'),true);
		if($allCountries){
			$countryArr['']='';
			foreach($allCountries as $count){
				$countryArr[$count['name']]=$count['name'];
			}
		}
		
        $this->set(compact('storeLocation','countryArr'));
        $this->set('_serialize', ['storeLocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Store Location id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storeLocation = $this->StoreLocations->get($id, [
            'contain' => ['StoreLocationDaysTimes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			if(!empty($this->request->data['store_image_new']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['store_image_new'],700,500,250,200,'StoresImages');
				//$this->Image->delete_image($this->request->data['store_image'],'StoresImages');
				$this->request->data['store_image']=$uploadImage;
			}
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $storeLocation = $this->StoreLocations->patchEntity($storeLocation, $this->request->getData());
			//$storeLocation->store_location_days_times=$data;
			//pr($storeLocation);die;
            if ($this->StoreLocations->save($storeLocation)) {
				$data=$this->StoreLocations->StoreLocationDaysTimes->formatDayTimeData($this->request->data,$id);
				if($data){
					$this->StoreLocations->StoreLocationDaysTimes->deleteAll(['store_location_id' => $id]);
					foreach($data as $tdata){
						$timeData=$this->StoreLocations->StoreLocationDaysTimes->newEntity();
						$timedata=$this->StoreLocations->StoreLocationDaysTimes->patchEntity($timeData,$tdata);
						$this->StoreLocations->StoreLocationDaysTimes->save($timedata);
					}
				}
				
				
                $this->Flash->success(__('The store location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store location could not be saved. Please, try again.'));
        }
		$allCountries=json_decode(file_get_contents('countries.json'),true);
		if($allCountries){
			$countryArr['']='';
			foreach($allCountries as $count){
				$countryArr[$count['name']]=$count['name'];
			}
		}
        $this->set(compact('storeLocation','countryArr'));
        $this->set('_serialize', ['storeLocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Store Location id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storeLocation = $this->StoreLocations->get($id);
        if ($this->StoreLocations->delete($storeLocation)) {
            $this->Flash->success(__('The store location has been deleted.'));
        } else {
            $this->Flash->error(__('The store location could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	function fieldEdit(){
		//pr($this->request->data);
		$id=$this->request->data['pk'];
		$storeLocation = $this->StoreLocations->get($id, [
            'contain' => []
        ]);
		//pr($storeLocation);
		//die;
		if(!empty($this->request->data['value'])){
			$this->request->data[$this->request->data['name']]=$this->request->data['value'];
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
			unset($this->request->data['value']);
			unset($this->request->data['name']);
			unset($this->request->data['pk']);
			$storeLocation = $this->StoreLocations->patchEntity($storeLocation, $this->request->getData());
			//pr($this->request->getData());
			if ($this->StoreLocations->save($storeLocation)) {
				//echo $this->request->data['value'];
				echo $id;
			}
		}
		die;
	}
	function fieldEditTime(){
		//pr($this->request->data);
		$id=$this->request->data['pk'];
		$storeLocation = $this->StoreLocations->StoreLocationDaysTimes->get($id, [
            'contain' => []
        ]);
		//pr($storeLocation);
		//die;
		if(!empty($this->request->data['value'])){
			$this->request->data[$this->request->data['name']]=$this->request->data['value'];
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
			unset($this->request->data['value']);
			unset($this->request->data['name']);
			unset($this->request->data['pk']);
			$storeLocation = $this->StoreLocations->StoreLocationDaysTimes->patchEntity($storeLocation, $this->request->getData());
			//pr($this->request->getData());
			if ($this->StoreLocations->StoreLocationDaysTimes->save($storeLocation)) {
				//echo $this->request->data['value'];
				echo $id;
			}
		}
		die;
	}
	
	
	function changeImage(){
		$id=$this->request->data['id'];
		 $storeLocation = $this->StoreLocations->get($id, [
            'contain' => []
        ]);
		if(!empty($this->request->data['store_image']['name'])){
				$uploadImage=$this->Image->upload_image_and_thumbnail($this->request->data['store_image'],700,500,250,200,'StoresImages');
				//$this->Image->delete_image($this->request->data['store_image_old'],'StoresImages');
				$this->request->data['store_image']=$uploadImage;
				$this->request->data['modify_date']=date('Y-m-d H:i:s');
				$storeLocation = $this->StoreLocations->patchEntity($storeLocation, $this->request->getData());
				if ($this->StoreLocations->save($storeLocation)) {
					echo json_encode(['name'=>$uploadImage]);
				}
			}
		die;
	}
}
