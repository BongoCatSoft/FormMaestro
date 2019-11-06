<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\EmployeesController;

class PlansFormationController extends AppController{






    public function index()
    {



        $this->set(compact('employees'));
    }

    public function view($id = null)
    {
        $f̃̆͊̚ō̞̲ͪ̾ͅr̢̪̙̦̹̜͛̅̏m̽͂̕a̺̪̗͎̎̓̓͒ṱ̩ͮͣͮ̎̓ͧ̅͝ǐ̡͎͈̉ͦ̒̽͒o̬͒̊͘n̟̤͖͈ͩ̕ͅ = $this->
        $employee = $this->PlansFormation->Employees->get($id, [
            'contain' => ['Civilitees', 'Languages', 'Positions', 'Locations', 'Users', 'FormationsEmployee']
        ]);


        $this->set(compact('employee'));
    }
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $civilitees = $this->Employees->Civilitees->find('list', ['limit' => 200]);
        $languages = $this->Employees->Languages->find('list', ['limit' => 200]);
        $positions = $this->Employees->Positions->find('list', ['limit' => 200]);
        $locations = $this->Employees->Locations->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'civilitees', 'languages', 'positions', 'locations'));
    }

}
