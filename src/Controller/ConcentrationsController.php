<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Concentrations Controller
 *
 * @property \App\Model\Table\ConcentrationsTable $Concentrations
 *
 * @method \App\Model\Entity\Concentration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConcentrationsController extends AppController
{
	public function initialize() {
		parent::initialize();
		$this->Auth->allow(['getByConcentration', 'add', 'edit', 'delete']);
		$this->viewBuilder()->setLayout('cakephp_default');
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Medications'],
        ];
        $concentrations = $this->paginate($this->Concentrations);

        $this->set(compact('concentrations'));
    }

    /**
     * View method
     *
     * @param string|null $id Concentration id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $concentration = $this->Concentrations->get($id, [
            'contain' => ['Medications'],
        ]);

        $this->set('concentration', $concentration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $concentration = $this->Concentrations->newEntity();
        if ($this->request->is('post')) {
            $concentration = $this->Concentrations->patchEntity($concentration, $this->request->getData());
            if ($this->Concentrations->save($concentration)) {
                $this->Flash->success(__('The concentration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The concentration could not be saved. Please, try again.'));
        }
        $medications = $this->Concentrations->Medications->find('list', ['limit' => 200]);
        $this->set(compact('concentration', 'medications'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Concentration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $concentration = $this->Concentrations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $concentration = $this->Concentrations->patchEntity($concentration, $this->request->getData());
            if ($this->Concentrations->save($concentration)) {
                $this->Flash->success(__('The concentration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The concentration could not be saved. Please, try again.'));
        }
        $medications = $this->Concentrations->Medications->find('list', ['limit' => 200]);
        $this->set(compact('concentration', 'medications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Concentration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $concentration = $this->Concentrations->get($id);
        if ($this->Concentrations->delete($concentration)) {
            $this->Flash->success(__('The concentration has been deleted.'));
        } else {
            $this->Flash->error(__('The concentration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
