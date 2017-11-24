<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[] paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
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
        $this->paginate = [
            'contain' => ['JobCategories']
        ];
        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
        $this->set('_serialize', ['jobs']);
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['JobCategories']
        ]);

        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
			$this->request->data['status']='active';
			$this->request->data['added_date']=date('Y-m-d H:i:s');
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $jobCategories = $this->Jobs->JobCategories->find('list',['keyField' => 'id','valueField' =>'cat_name','limit' => 200])->toArray();
        $this->set(compact('job', 'jobCategories'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $jobCategories = $this->Jobs->JobCategories->find('list',['keyField' => 'id','valueField' =>'cat_name','limit' => 200])->toArray();
        $this->set(compact('job', 'jobCategories'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function jobsCategories(){
		$jobCategory= TableRegistry::get('JobCategories');
        $jobCategories = $jobCategory->find('all');
		$jobCategories = $this->Paginator->paginate($jobCategories,['order' =>['id' => 'desc']]);
		
        $this->set('jobCategories', $jobCategories);
        $this->set('_serialize', ['jobCategories']);
	}
	
	public function addCat(){
		$this->viewBuilder()->setLayout('ajax');
		$jobCategory= TableRegistry::get('JobCategories');
		$jobCategory = $jobCategory->newEntity();
		$this->set(compact('jobCategory'));
        $this->set('_serialize', ['jobCategory']);
	}
	
	public function addNewCat(){
		//pr($this->request->data);
		$jobCategories= TableRegistry::get('JobCategories');
		$jobCategory = $jobCategories->newEntity();
		$this->request->data['added_date']=date('Y-m-d H:i:s');
		$jobCategory = $jobCategories->patchEntity($jobCategory, $this->request->getData());
		if($jobCategories->save($jobCategory)){
			$this->Flash->success(__('The Category has been saved.'));
			echo json_encode(['type'=>'success','msg'=>'Category Added.']);
		}else{
			echo json_encode(['type'=>'error','msg'=>'Try again.']);
		}
		die;
	}
	
	function catFieldEdit(){
		$id=$this->request->data['pk'];
		$jobCategories= TableRegistry::get('JobCategories');
		$jobCategory = $jobCategories->get($id);
		
		if(!empty($this->request->data['value'])){
			$this->request->data[$this->request->data['name']]=$this->request->data['value'];
			$this->request->data['modify_date']=date('Y-m-d H:i:s');
			unset($this->request->data['value']);
			unset($this->request->data['name']);
			unset($this->request->data['pk']);
			$jobCategory = $jobCategories->patchEntity($jobCategory, $this->request->getData());
			if ($jobCategories->save($jobCategory)) {
				echo $id;
			}
		}
		die;
	}
	
	public function deletecat($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$jobCategories= TableRegistry::get('JobCategories');
        $jobcat = $jobCategories->get($id);
        if ($jobCategories->delete($jobcat)) {
            $this->Flash->success(__('The job category has been deleted.'));
        } else {
            $this->Flash->error(__('The job category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'jobsCategories']);
    }
}
