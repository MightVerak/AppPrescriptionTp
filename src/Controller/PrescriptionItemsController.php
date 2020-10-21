<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PrescriptionItems Controller
 *
 * @property \App\Model\Table\PrescriptionItemsTable $PrescriptionItems
 *
 * @method \App\Model\Entity\PrescriptionItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrescriptionItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
	 
	public function isAuthorized($user) 
	{
		$action = $this->request->getParam('action');
		
		if (in_array($action, ['index'])) {
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
            'contain' => ['Prescriptions', 'Medications'],
        ];
        $prescriptionItems = $this->paginate($this->PrescriptionItems);

        $this->set(compact('prescriptionItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Prescription Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prescriptionItem = $this->PrescriptionItems->get($id, [
            'contain' => ['Prescriptions', 'Medications'],
        ]);

        $this->set('prescriptionItem', $prescriptionItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prescriptionItem = $this->PrescriptionItems->newEntity();
        if ($this->request->is('post')) {
            $prescriptionItem = $this->PrescriptionItems->patchEntity($prescriptionItem, $this->request->getData());
            if ($this->PrescriptionItems->save($prescriptionItem)) {
                $this->Flash->success(__('The prescription item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription item could not be saved. Please, try again.'));
        }
        $prescriptions = $this->PrescriptionItems->Prescriptions->find('list', ['limit' => 200]);
        $medications = $this->PrescriptionItems->Medications->find('list', ['limit' => 200]);
        $this->set(compact('prescriptionItem', 'prescriptions', 'medications'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prescription Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prescriptionItem = $this->PrescriptionItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prescriptionItem = $this->PrescriptionItems->patchEntity($prescriptionItem, $this->request->getData());
            if ($this->PrescriptionItems->save($prescriptionItem)) {
                $this->Flash->success(__('The prescription item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription item could not be saved. Please, try again.'));
        }
        $prescriptions = $this->PrescriptionItems->Prescriptions->find('list', ['limit' => 200]);
        $medications = $this->PrescriptionItems->Medications->find('list', ['limit' => 200]);
        $this->set(compact('prescriptionItem', 'prescriptions', 'medications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prescription Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prescriptionItem = $this->PrescriptionItems->get($id);
        if ($this->PrescriptionItems->delete($prescriptionItem)) {
            $this->Flash->success(__('The prescription item has been deleted.'));
        } else {
            $this->Flash->error(__('The prescription item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
