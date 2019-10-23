<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Employee;
use Cake\Core\App;
use Cake\Mailer\Email;
use App\Controller\EmployeesController;

class HomeController extends AppController{

    public function index(){

        if ($this->request->is('post')) {

            $email = $this->request->getData(['Courriel']);
            $employee = $this->trouverEmployee($email);

            var_dump($employee);
            //$this->sendEmail($email);
            $this->Flash->success('Si un utilisateur est lié à ce courriel, le plan de formation lui seras envoyé.');
        }

    }

    public function trouverEmployee($email){

        $Employee = new Employee();
        //FIXME : Comment trouver l'employee avec le courriel ?
        $Employee = $Employee->find('all')->where(['Employees.email >' => $email]);

        return $Employee;
    }

    public function sendEmail($courriel)
    {
        $email = new Email('default');
        $email->to($courriel)->setSubject(__('Plan de formation'))->send(__('Cliquez sur le lien suivant pour confirmer votre courriel sur le site Plant Inventory : ') .
            $user->link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot .
                "users/confirm/");
    }
















}
