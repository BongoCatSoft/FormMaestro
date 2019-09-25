<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Proofs Controller
 *
 * @property \App\Model\Table\ProofsTable $Proofs
 *
 * @method \App\Model\Entity\Proof[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProofsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $proofs = $this->paginate($this->Proofs);

        $this->set(compact('proofs'));
    }

    /**
     * View method
     *
     * @param string|null $id Proof id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proof = $this->Proofs->get($id, [
            'contain' => ['FormationsEmployee', 'FormationsPosition']
        ]);

        $this->set('proof', $proof);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proof = $this->Proofs->newEntity();
        if ($this->request->is('post')) {
            $proof = $this->Proofs->patchEntity($proof, $this->request->getData());
            if ($this->Proofs->save($proof)) {
                $this->Flash->success(__('The proof has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proof could not be saved. Please, try again.'));
        }
        $this->set(compact('proof'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Proof id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proof = $this->Proofs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proof = $this->Proofs->patchEntity($proof, $this->request->getData());
            if ($this->Proofs->save($proof)) {
                $this->Flash->success(__('The proof has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proof could not be saved. Please, try again.'));
        }
        $this->set(compact('proof'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proof id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proof = $this->Proofs->get($id);
        if ($this->Proofs->delete($proof)) {
            $this->Flash->success(__('The proof has been deleted.'));
        } else {
            $this->Flash->error(__('The proof could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
