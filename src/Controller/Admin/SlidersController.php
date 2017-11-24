<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 *
 * @method \App\Model\Entity\Slider[] paginate($object = null, array $settings = [])
 */
class SlidersController extends AppController
{
	 public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Image');
	   $this->viewBuilder()->setLayout('admin');
	}
	 public $paginate = [
         'order' => [
            'Sliders.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sliders = $this->paginate($this->Sliders);

        $this->set(compact('sliders'));
        $this->set('_serialize', ['sliders']);
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function view($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);

        $this->set('slider', $slider);
        $this->set('_serialize', ['slider']);
    }*/

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slider = $this->Sliders->newEntity();
        if ($this->request->is('post')) {
			
			if(!empty($this->request->data['desktop_image']['name'])){
				$uploadDesktopImage=$this->Image->upload_image_and_thumbnail($this->request->data['desktop_image'],700,500,250,200,'SlidersDesktopImages');
				$this->request->data['desktop_image']=$uploadDesktopImage;
			}else{
				$this->request->data['desktop_image']='';
			}
			if(!empty($this->request->data['mobile_image']['name'])){
				$uploadDesktopImage=$this->Image->upload_image_and_thumbnail($this->request->data['mobile_image'],700,500,250,200,'SlidersMobileImages');
				$this->request->data['mobile_image']=$uploadDesktopImage;
			}else{
				$this->request->data['mobile_image']='';
			}
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
            $slider = $this->Sliders->patchEntity($slider, $this->request->getData());
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The slider could not be saved. Please, try again.'));
        }
        $this->set(compact('slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			//pr($this->request->data['desktop_image']);die;
			if(!empty($this->request->data['desktop_image_new']['name'])){
				$uploadDesktopImage=$this->Image->upload_image_and_thumbnail($this->request->data['desktop_image_new'],700,500,250,200,'SlidersDesktopImages');
				$this->Image->delete_image($this->request->data['desktop_image'],'SlidersDesktopImages');
				$this->request->data['desktop_image']=$uploadDesktopImage;
			}
			if(!empty($this->request->data['mobile_image_new']['name'])){
				$uploadDesktopImage=$this->Image->upload_image_and_thumbnail($this->request->data['mobile_image_new'],700,500,250,200,'SlidersMobileImages');
				$this->Image->delete_image($this->request->data['mobile_image_new'],'SlidersMobileImages');
				$this->request->data['mobile_image']=$uploadDesktopImage;
			}
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $slider = $this->Sliders->patchEntity($slider, $this->request->getData());
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The slider could not be saved. Please, try again.'));
        }
        $this->set(compact('slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        if ($this->Sliders->delete($slider)) {
            $this->Flash->success(__('The slider has been deleted.'));
        } else {
            $this->Flash->error(__('The slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
