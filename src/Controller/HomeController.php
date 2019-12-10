<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\EmployeesController;
use App\Model\Entity\Employee;
use Cake\Core\App;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;


class HomeController extends AppController{

    public function isAuthorized($user)
    {
        return true;
    }

    public function home(){

        if ($this->request->is('post')) {

            $email = $this->request->getData(['Courriel']);
            $employee = $this->trouverEmployee($email);

            $this->Flash->success('Si un utilisateur est lié à ce courriel, le plan de formation lui seras envoyé.');

            if($employee != null)
                $this->sendEmail($employee->get('email'), $employee);
        }

    }

    public function trouverEmployee($email){

        $Employees = TableRegistry::getTableLocator()->get('Employees');

        return $Employees->find('all')->where(['email ' => $email])->first();
    }

    public function sendEmail($courriel, $employee)
    {
        $this->loadModel('Employees');

        $donneesPlan = (new EmployeesController())->getDonneesPlan($employee->id);

        $email = new Email('bongoMail');
        $email->viewBuilder()->setTemplate('planFormation');
        $email->viewBuilder()->setLayout('planFormation');
        $email->setEmailFormat('html');
        $email->setViewVars([
            'employee' => $donneesPlan['employee'],
            'formations_array' => $donneesPlan['formations_array'],
            'location' =>$donneesPlan['location']
        ]);
        $email->setTo($courriel)->setSubject(__('Plan de formation'));
        $email->send();
    }
















}
