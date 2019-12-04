<?php
use App\Model\Entity\Employee;
use App\Shell\ConsoleShell;
use App\Controller\EmployeesController;

class SendPlan extends ConsoleShell {
    public $employees = array('Employee');

    public function sendEveryonePlan(){
        $this->loadModel('Employee');
        $controllerEmployee = new EmployeesController();
        $activeEmployees = $this->Employees->find()->where(['active ==' => 1])->all();
        foreach ($activeEmployees as $activeEmployee){
            $controllerEmployee->envoyerPlan($activeEmployee->id);
        }
    }

}

?>
