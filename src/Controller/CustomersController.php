<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		
		$this->loadComponent('Flash');
		$this->loadModel('Files');
		$this->viewBuilder()->setLayout('cakephp_default');
	}
	 
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
            'contain' => ['Users', 'Addresses', 'Files'],
        ];
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
	}

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Users', 'Addresses', 'Physicians', 'Prescriptions'],
        ]);

        $this->set('customer', $customer);
		
		$uploadData = '';
		
		if ($this->request->is('post')) {
			if(!empty($this->request->data['file']['name'])) {
				$fileName = $this->request->data['file']['name'];
				$uploadPath = 'uploads/files/';
				$uploadFile = $uploadPath.$fileName;
				if(move_uploaded_file($this->request->data['file']['tmp_name'], $uploadFile)) {
					$uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
					if ($this->Files->save($uploadData)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
            
        }
        $this->set('uploadData', $uploadData);
        
        $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);
    }
	
	public function prescriptions()
	{
		$prescriptions = $this->request->getParam('pass');
		
		$customers = $this->Customers->find('prescription', [
		'prescriptions' => $prescriptions
		]);
		
		$this->set([
			'customers' => $customers,
			'prescriptions' => $prescriptions
		]);
	}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $addresses = $this->Customers->Addresses->find('list', ['limit' => 200]);
        $physicians = $this->Customers->Physicians->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'users', 'addresses', 'physicians'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Physicians'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $addresses = $this->Customers->Addresses->find('list', ['limit' => 200]);
        $physicians = $this->Customers->Physicians->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'users', 'addresses', 'physicians'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
