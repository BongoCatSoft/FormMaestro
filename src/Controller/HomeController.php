<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Employee;
use Cake\Core\App;
use Cake\Mailer\Email;
use App\Controller\EmployeesController;
use Cake\ORM\TableRegistry;


class HomeController extends AppController{

    public function index(){

        if ($this->request->is('post')) {

            $email = $this->request->getData(['Courriel']);
            $employee = $this->trouverEmployee($email);

            $this->sendEmail($employee);
            $this->Flash->success('Si un utilisateur est lié à ce courriel, le plan de formation lui seras envoyé.');
        }

    }

    public function trouverEmployee($email){

        $Employees = TableRegistry::getTableLocator()->get('Employees');

        return $Employees->find('all')->where(['Employees.email >' => $email])->first();
    }

    public function sendEmail($employee)
    {
        Email::deliver('notifications@bongocatsoft.ca', 'Subject', 'Message', ['from' => 'admin@bongocatsoft.com']);
    }

}
