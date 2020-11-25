<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Prescriptions Controller
 *
 * @property \App\Model\Table\PrescriptionsTable $Prescriptions
 *
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrescriptionsController extends AppController
{
	
	public function initialize() 
	{
		parent::initialize();
		$this->viewBuilder()->setLayout('cakephp_default');
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
	 
	public function isAuthorized($user) 
	{
		$action = $this->request->getParam('action');
		
		if (in_array($action, ['index', 'add'])) {
			return true;
		}
		
		$id = $this->request->getParam('pass.0');
		if (!$id) {
			return false;
		}
		
		if ($id == $user['id']) {
			return true;
		} else {
			return parent::isAuthorized($user);
		}
	}
	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Physicians', 'Medications',],
        ];
        $prescriptions = $this->paginate($this->Prescriptions);

        $this->set(compact('prescriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prescription = $this->Prescriptions->get($id, [
            'contain' => ['Customers', 'Physicians', 'Medications'],
        ]);

        $this->set('prescription', $prescription);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prescription = $this->Prescriptions->newEntity();
        if ($this->request->is('post')) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());
            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }
        $customers = $this->Prescriptions->Customers->find('list', ['limit' => 200]);
        $physicians = $this->Prescriptions->Physicians->find('list', ['limit' => 200]);
		$medications = $this->Prescriptions->Medications->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'customers', 'physicians'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prescription = $this->Prescriptions->get($id, [
            'contain' => ['Medications'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());
            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }
        $customers = $this->Prescriptions->Customers->find('list', ['limit' => 200]);
        $physicians = $this->Prescriptions->Physicians->find('list', ['limit' => 200]);
		$medications = $this->Prescriptions->Medications->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'customers', 'physicians', 'medications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prescription = $this->Prescriptions->get($id);
        if ($this->Prescriptions->delete($prescription)) {
            $this->Flash->success(__('The prescription has been deleted.'));
        } else {
            $this->Flash->error(__('The prescription could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
