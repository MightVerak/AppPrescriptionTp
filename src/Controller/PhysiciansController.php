<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Physicians Controller
 *
 * @property \App\Model\Table\PhysiciansTable $Physicians
 *
 * @method \App\Model\Entity\Physician[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhysiciansController extends AppController
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
            'contain' => ['Addresses'],
        ];
        $physicians = $this->paginate($this->Physicians);

        $this->set(compact('physicians'));
    }

    /**
     * View method
     *
     * @param string|null $id Physician id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $physician = $this->Physicians->get($id, [
            'contain' => ['Addresses', 'Customers', 'Prescriptions'],
        ]);

        $this->set('physician', $physician);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $physician = $this->Physicians->newEntity();
        if ($this->request->is('post')) {
            $physician = $this->Physicians->patchEntity($physician, $this->request->getData());
            if ($this->Physicians->save($physician)) {
                $this->Flash->success(__('The physician has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The physician could not be saved. Please, try again.'));
        }
        $addresses = $this->Physicians->Addresses->find('list', ['limit' => 200]);
        $customers = $this->Physicians->Customers->find('list', ['limit' => 200]);
        $this->set(compact('physician', 'addresses', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Physician id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $physician = $this->Physicians->get($id, [
            'contain' => ['Customers'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $physician = $this->Physicians->patchEntity($physician, $this->request->getData());
            if ($this->Physicians->save($physician)) {
                $this->Flash->success(__('The physician has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The physician could not be saved. Please, try again.'));
        }
        $addresses = $this->Physicians->Addresses->find('list', ['limit' => 200]);
        $customers = $this->Physicians->Customers->find('list', ['limit' => 200]);
        $this->set(compact('physician', 'addresses', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Physician id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $physician = $this->Physicians->get($id);
        if ($this->Physicians->delete($physician)) {
            $this->Flash->success(__('The physician has been deleted.'));
        } else {
            $this->Flash->error(__('The physician could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
