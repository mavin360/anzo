<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;
/**
 * Settings Controller
 *
 * @property \App\Model\Table\SettingsTable $Settings
 *
 * @method \App\Model\Entity\Setting[] paginate($object = null, array $settings = [])
 */
class SettingsController extends AppController
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
		$this->loadComponent('Csrf');
		
	   $this->viewBuilder()->setLayout('admin');
	}
	
	
    public function index()
    {
        $settings = $this->paginate($this->Settings)->toArray();
        $this->set(compact('settings'));
        $this->set('_serialize', ['settings']);
    }

	
    /**
     * Edit method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setting = $this->Settings->find('all',[
            'contain' => []
        ])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $setting = $this->Settings->patchEntity($setting, $this->request->getData());
            if ($this->Settings->save($setting)) {
                $this->Flash->success(__('The setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setting could not be saved. Please, try again.'));
        }
        $this->set(compact('setting'));
        $this->set('_serialize', ['setting']);
    }

	
    /**
     * View method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function subscriptions  ()
    {
		$subscription= TableRegistry::get('Subscriptions');
        $subscriptions = $subscription->find('all');
		$subscriptions = $this->Paginator->paginate($subscriptions,['order' =>['id' => 'desc']]);
        $this->set('subscriptions', $subscriptions);
        $this->set('_serialize', ['subscriptions']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $setting = $this->Settings->newEntity();
        if ($this->request->is('post')) {
            $setting = $this->Settings->patchEntity($setting, $this->request->getData());
            if ($this->Settings->save($setting)) {
                $this->Flash->success(__('The setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setting could not be saved. Please, try again.'));
        }
        $this->set(compact('setting'));
        $this->set('_serialize', ['setting']);
    }
	
	
	function fieldEdit(){
		//pr($this->request->data);
		$setting = $this->Settings->find('all')->first();
		if(!empty($this->request->data['value'])){
			$this->request->data[$this->request->data['name']]=$this->request->data['value'];
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
			//unset($this->request->data['value']);
			unset($this->request->data['name']);
			unset($this->request->data['pk']);
			$setting = $this->Settings->patchEntity($setting, $this->request->getData());
			if ($this->Settings->save($setting)) {
				echo $this->request->data['value'];
			}
		}
		die;
	}

    /**
     * Delete method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setting = $this->Settings->get($id);
        if ($this->Settings->delete($setting)) {
            $this->Flash->success(__('The setting has been deleted.'));
        } else {
            $this->Flash->error(__('The setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
