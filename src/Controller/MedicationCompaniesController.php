<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MedicationCompanies Controller
 *
 * @property \App\Model\Table\MedicationCompaniesTable $MedicationCompanies
 *
 * @method \App\Model\Entity\MedicationCompany[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicationCompaniesController extends AppController
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
        $medicationCompanies = $this->paginate($this->MedicationCompanies);

        $this->set(compact('medicationCompanies'));
    }

    /**
     * View method
     *
     * @param string|null $id Medication Company id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicationCompany = $this->MedicationCompanies->get($id, [
            'contain' => [],
        ]);

        $this->set('medicationCompany', $medicationCompany);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicationCompany = $this->MedicationCompanies->newEntity();
        if ($this->request->is('post')) {
            $medicationCompany = $this->MedicationCompanies->patchEntity($medicationCompany, $this->request->getData());
            if ($this->MedicationCompanies->save($medicationCompany)) {
                $this->Flash->success(__('The medication company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medication company could not be saved. Please, try again.'));
        }
        $this->set(compact('medicationCompany'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medication Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicationCompany = $this->MedicationCompanies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicationCompany = $this->MedicationCompanies->patchEntity($medicationCompany, $this->request->getData());
            if ($this->MedicationCompanies->save($medicationCompany)) {
                $this->Flash->success(__('The medication company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medication company could not be saved. Please, try again.'));
        }
        $this->set(compact('medicationCompany'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medication Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicationCompany = $this->MedicationCompanies->get($id);
        if ($this->MedicationCompanies->delete($medicationCompany)) {
            $this->Flash->success(__('The medication company has been deleted.'));
        } else {
            $this->Flash->error(__('The medication company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
