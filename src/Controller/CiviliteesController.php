<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Civilitees Controller
 *
 * @property \App\Model\Table\CiviliteesTable $Civilitees
 *
 * @method \App\Model\Entity\Civilitee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CiviliteesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $civilitees = $this->paginate($this->Civilitees);

        $this->set(compact('civilitees'));
    }

    /**
     * View method
     *
     * @param string|null $id Civilitee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $civilitee = $this->Civilitees->get($id, [
            'contain' => []
        ]);

        $this->set('civilitee', $civilitee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $civilitee = $this->Civilitees->newEntity();
        if ($this->request->is('post')) {
            $civilitee = $this->Civilitees->patchEntity($civilitee, $this->request->getData());
            if ($this->Civilitees->save($civilitee)) {
                $this->Flash->success(__('The civilitee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civilitee could not be saved. Please, try again.'));
        }
        $this->set(compact('civilitee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Civilitee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $civilitee = $this->Civilitees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $civilitee = $this->Civilitees->patchEntity($civilitee, $this->request->getData());
            if ($this->Civilitees->save($civilitee)) {
                $this->Flash->success(__('The civilitee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civilitee could not be saved. Please, try again.'));
        }
        $this->set(compact('civilitee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Civilitee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $civilitee = $this->Civilitees->get($id);
        if ($this->Civilitees->delete($civilitee)) {
            $this->Flash->success(__('The civilitee has been deleted.'));
        } else {
            $this->Flash->error(__('The civilitee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
