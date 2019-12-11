<?php
namespace App\Shell;

use App\Model\Entity\Employee;
use App\Controller\EmployeesController;
use App\Controller\HomeController;

class sendPlanShell extends \Cake\Console\Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Employees');
    }

    public function main(){
        $activeEmployees = $this->Employees->find()->where(['active =' => 1])->all();

        foreach ($activeEmployees as $activeEmployee) {
            (new HomeController())->sendEmail($activeEmployee->email, $activeEmployee);
        }
    }

}
