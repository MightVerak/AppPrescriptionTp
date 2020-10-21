<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersPhysicians Controller
 *
 * @property \App\Model\Table\CustomersPhysiciansTable $CustomersPhysicians
 *
 * @method \App\Model\Entity\CustomersPhysician[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersPhysiciansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Physicians'],
        ];
        $customersPhysicians = $this->paginate($this->CustomersPhysicians);

        $this->set(compact('customersPhysicians'));
    }

    /**
     * View method
     *
     * @param string|null $id Customers Physician id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersPhysician = $this->CustomersPhysicians->get($id, [
            'contain' => ['Customers', 'Physicians'],
        ]);

        $this->set('customersPhysician', $customersPhysician);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersPhysician = $this->CustomersPhysicians->newEntity();
        if ($this->request->is('post')) {
            $customersPhysician = $this->CustomersPhysicians->patchEntity($customersPhysician, $this->request->getData());
            if ($this->CustomersPhysicians->save($customersPhysician)) {
                $this->Flash->success(__('The customers physician has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers physician could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersPhysicians->Customers->find('list', ['limit' => 200]);
        $physicians = $this->CustomersPhysicians->Physicians->find('list', ['limit' => 200]);
        $this->set(compact('customersPhysician', 'customers', 'physicians'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Physician id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersPhysician = $this->CustomersPhysicians->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersPhysician = $this->CustomersPhysicians->patchEntity($customersPhysician, $this->request->getData());
            if ($this->CustomersPhysicians->save($customersPhysician)) {
                $this->Flash->success(__('The customers physician has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers physician could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersPhysicians->Customers->find('list', ['limit' => 200]);
        $physicians = $this->CustomersPhysicians->Physicians->find('list', ['limit' => 200]);
        $this->set(compact('customersPhysician', 'customers', 'physicians'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Physician id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersPhysician = $this->CustomersPhysicians->get($id);
        if ($this->CustomersPhysicians->delete($customersPhysician)) {
            $this->Flash->success(__('The customers physician has been deleted.'));
        } else {
            $this->Flash->error(__('The customers physician could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
