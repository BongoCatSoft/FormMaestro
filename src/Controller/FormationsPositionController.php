<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationsPosition Controller
 *
 * @property \App\Model\Table\FormationsPositionTable $FormationsPosition
 *
 * @method \App\Model\Entity\FormationsPosition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormationsPositionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Positions', 'Formations', 'Proofs']
        ];
        $formationsPosition = $this->paginate($this->FormationsPosition);

        $this->set(compact('formationsPosition'));
    }

    /**
     * View method
     *
     * @param string|null $id Formations Position id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationsPosition = $this->FormationsPosition->get($id, [
            'contain' => ['Positions', 'Formations', 'Proofs']
        ]);

        $this->set('formationsPosition', $formationsPosition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationsPosition = $this->FormationsPosition->newEntity();
        if ($this->request->is('post')) {
            $formationsPosition = $this->FormationsPosition->patchEntity($formationsPosition, $this->request->getData());
            if ($this->FormationsPosition->save($formationsPosition)) {
                $this->Flash->success(__('The formations position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations position could not be saved. Please, try again.'));
        }
        $positions = $this->FormationsPosition->Positions->find('list', ['limit' => 200]);
        $formations = $this->FormationsPosition->Formations->find('list', ['limit' => 200]);
        $proofs = $this->FormationsPosition->Proofs->find('list', ['limit' => 200]);
        $this->set(compact('formationsPosition', 'positions', 'formations', 'proofs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formations Position id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationsPosition = $this->FormationsPosition->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationsPosition = $this->FormationsPosition->patchEntity($formationsPosition, $this->request->getData());
            if ($this->FormationsPosition->save($formationsPosition)) {
                $this->Flash->success(__('The formations position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations position could not be saved. Please, try again.'));
        }
        $positions = $this->FormationsPosition->Positions->find('list', ['limit' => 200]);
        $formations = $this->FormationsPosition->Formations->find('list', ['limit' => 200]);
        $proofs = $this->FormationsPosition->Proofs->find('list', ['limit' => 200]);
        $this->set(compact('formationsPosition', 'positions', 'formations', 'proofs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formations Position id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationsPosition = $this->FormationsPosition->get($id);
        if ($this->FormationsPosition->delete($formationsPosition)) {
            $this->Flash->success(__('The formations position has been deleted.'));
        } else {
            $this->Flash->error(__('The formations position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {

        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'edit'] ) && $user['role'] === 0) {
            return true;
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');

        return $user['role'] === 1;
    }
}
