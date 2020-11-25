<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Medications Controller
 *
 * @property \App\Model\Table\MedicationsTable $Medications
 *
 * @method \App\Model\Entity\Medication[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $medications = $this->paginate($this->Medications);

        $this->set(compact('medications'));
    }
	
	public function initialize() {
		parent::initialize();
		$this->Auth->allow(['findMedications', 'add', 'edit', 'delete']);
		$this->viewBuilder()->setLayout('cakephp_default');
	}
	
	public function getByCategory() {
		$category_id = $this->request->query('category_id');
		
		$medications = $this->Medications->find('all', [
			'conditions' => ['Medications.category_id' => $category_id],
		]);
		
		$data = '';
		foreach ($medications as $medication) {
			$data .= '<option value="' . $medication->id . '">' . $medication->medication . '</option>';
		}
		$this->autoRender = false;
		echo $data;
	
	}
	
	public function findMedications() {
		
		if ($this->request->is('ajax')) {
			
			$this->autoRender = false;
			$name = $this->request->query['term'];
			$results = $this->Medications->find('all', array(
				'conditions' => array('Medications.medication LIKE ' => '%' . $name . '%')
			));
			
			$resultArr = array();
			foreach ($results as $result) {
				$resultArr[] = array('label' => $result['medication'], 'value' => $result['id']);
			}
			echo json_encode($resultArr);
		}
	}

    /**
     * View method
     *
     * @param string|null $id Medication id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medication = $this->Medications->get($id, [
            'contain' => ['Concentrations'],
        ]);

        $this->set('medication', $medication);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medication = $this->Medications->newEntity();
        if ($this->request->is('post')) {
            $medication = $this->Medications->patchEntity($medication, $this->request->getData());
            if ($this->Medications->save($medication)) {
                $this->Flash->success(__('The medication has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medication could not be saved. Please, try again.'));
        }
		$categories = $this->Medications->Categories->find('list', ['limit' => 200]);
        $this->set(compact('medication', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medication id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medication = $this->Medications->get($id, [
            'contain' => ['Categories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medication = $this->Medications->patchEntity($medication, $this->request->getData());
            if ($this->Medications->save($medication)) {
                $this->Flash->success(__('The medication has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medication could not be saved. Please, try again.'));
        }
        $this->set(compact('medication'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medication id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medication = $this->Medications->get($id);
        if ($this->Medications->delete($medication)) {
            $this->Flash->success(__('The medication has been deleted.'));
        } else {
            $this->Flash->error(__('The medication could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
