<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modalities Controller
 *
 * @property \App\Model\Table\ModalitiesTable $Modalities
 *
 * @method \App\Model\Entity\Modality[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModalitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $modalities = $this->paginate($this->Modalities);

        $this->set(compact('modalities'));
    }

    /**
     * View method
     *
     * @param string|null $id Modality id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modality = $this->Modalities->get($id, [
            'contain' => ['Formations']
        ]);

        $this->set('modality', $modality);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modality = $this->Modalities->newEntity();
        if ($this->request->is('post')) {
            $modality = $this->Modalities->patchEntity($modality, $this->request->getData());
            if ($this->Modalities->save($modality)) {
                $this->Flash->success(__('The modality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modality could not be saved. Please, try again.'));
        }
        $this->set(compact('modality'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modality id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modality = $this->Modalities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modality = $this->Modalities->patchEntity($modality, $this->request->getData());
            if ($this->Modalities->save($modality)) {
                $this->Flash->success(__('The modality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modality could not be saved. Please, try again.'));
        }
        $this->set(compact('modality'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modality id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modality = $this->Modalities->get($id);
        if ($this->Modalities->delete($modality)) {
            $this->Flash->success(__('The modality has been deleted.'));
        } else {
            $this->Flash->error(__('The modality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
