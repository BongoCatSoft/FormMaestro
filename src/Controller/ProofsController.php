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
                if (!empty($this->request->getData('original_file_name'))) {
                    $fileName = $this->request->data['original_file_name']['name'];
                        if (strpos($fileName, 'pdf') !== false || strpos($fileName, 'PDF') !== false ||
                            strpos($fileName, 'jpg') !== false || strpos($fileName, 'JPG') !== false ||
                            strpos($fileName, 'jpeg') !== false || strpos($fileName, 'JPEG') !== false ||
                            strpos($fileName, 'png') !== false || strpos($fileName, 'PNG') !== false ||
                            strpos($fileName,'iso')){

                                if(filesize($this->request->data['original_file_name']['tmp_name']) <= 37500){

                                    if (move_uploaded_file($this->request->data['original_file_name']['tmp_name'],  'webroot/Files/ ' . $fileName)) {
                                        $proof = $this->Proofs->patchEntity($proof, $this->request->getData());
                                        $proof->original_file_name = $fileName;

                                    if ($this->Proofs->save($proof)) {

                                        $this->Flash->success(__('Proof has been uploaded and inserted successfully.'));

                                    } else {

                                        $this->Flash->error(__('Unable to upload proof, please try again!'));
                                    }
                                }else{
                                    $this->Flash->error(__('Please choose a proof to upload.'));
                                }

                    } else {
                        $this->Flash->error(__('Votre fichier est trop gros'));
                        var_dump($this->request->getData());
                    }
                } else {
                    $this->Flash->error(__('Mauvais type de fichier'));
                }

            }
            //$this->set(compact('proof'));

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

    public function allowed_file(){

        $allowed = array('img/files/pdf','img/files/jpeg');  //application = folder ou on mets les fichier

        if(in_array($_FILES['resume']['type'], $allowed) AND in_array($_FILES['reference']['type'], $allowed)){

            if($_FILES["resume"]["size"] < 300000 AND $_FILES["reference"]["size"] < 100 ){

                //file is good
                return true;
            }else{

                $this->Flash->error(__('Le fichied est trop gros'));
                return false;
                //fichier trop gros
            }


        }else{

            $this->Flash->error(__('Mauvais type de fichier'));
            return false;
            //bad file error
            //mauvaise extension du fichier
        }


    }
}
