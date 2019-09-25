<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationsEmployee Controller
 *
 * @property \App\Model\Table\FormationsEmployeeTable $FormationsEmployee
 *
 * @method \App\Model\Entity\FormationsEmployee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormationsEmployeeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Formations', 'Proofs']
        ];
        $formationsEmployee = $this->paginate($this->FormationsEmployee);

        $this->set(compact('formationsEmployee'));
    }

    /**
     * View method
     *
     * @param string|null $id Formations Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationsEmployee = $this->FormationsEmployee->get($id, [
            'contain' => ['Employees', 'Formations', 'Proofs']
        ]);

        $this->set('formationsEmployee', $formationsEmployee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationsEmployee = $this->FormationsEmployee->newEntity();
        if ($this->request->is('post')) {
            $formationsEmployee = $this->FormationsEmployee->patchEntity($formationsEmployee, $this->request->getData());
            if ($this->FormationsEmployee->save($formationsEmployee)) {
                $this->Flash->success(__('The formations employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations employee could not be saved. Please, try again.'));
        }
        $employees = $this->FormationsEmployee->Employees->find('list', ['limit' => 200]);
        $formations = $this->FormationsEmployee->Formations->find('list', ['limit' => 200]);
        $proofs = $this->FormationsEmployee->Proofs->find('list', ['limit' => 200]);
        $this->set(compact('formationsEmployee', 'employees', 'formations', 'proofs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formations Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationsEmployee = $this->FormationsEmployee->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationsEmployee = $this->FormationsEmployee->patchEntity($formationsEmployee, $this->request->getData());
            if ($this->FormationsEmployee->save($formationsEmployee)) {
                $this->Flash->success(__('The formations employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations employee could not be saved. Please, try again.'));
        }
        $employees = $this->FormationsEmployee->Employees->find('list', ['limit' => 200]);
        $formations = $this->FormationsEmployee->Formations->find('list', ['limit' => 200]);
        $proofs = $this->FormationsEmployee->Proofs->find('list', ['limit' => 200]);
        $this->set(compact('formationsEmployee', 'employees', 'formations', 'proofs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formations Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationsEmployee = $this->FormationsEmployee->get($id);
        if ($this->FormationsEmployee->delete($formationsEmployee)) {
            $this->Flash->success(__('The formations employee has been deleted.'));
        } else {
            $this->Flash->error(__('The formations employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
