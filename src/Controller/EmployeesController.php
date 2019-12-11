<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Formation;
use Cake\I18n\Time;
use phpDocumentor\Reflection\Types\Integer;
use Cake\I18n\Date;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Civilitees', 'Languages', 'Positions', 'Locations']
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Civilitees', 'Languages', 'Positions', 'Locations', 'Users', 'FormationsEmployee']
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
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

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {

        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'edit', 'delete', 'plan', 'envoyerPlan'] ) && $user['role'] === 0) {
            return true;
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');

        return $user['role'] === 1;
    }

    public function plan($id){
        $donneesPlan = $this->getDonneesPlan($id);
        $employee = $donneesPlan['employee'];
        $formations_array = $donneesPlan['formations_array'];
        $location = $donneesPlan['location'];
        $today = Time::now();
        $this->set(compact('employee', 'formations_array', 'location'));
    }

    public function getDonneesPlan($id){
        $formations_temp = $this->Employees->FormationsEmployee->find('all')->where(['employee_id' =>$id]);
        $employee = $this->Employees->get($id, []);
        $location = $this->Employees->Locations->find()->where(['id'=>$employee->location_id])->first();
        $formations_array = [];
        $today = Time::now();
        foreach ($formations_temp as $formation_employee){
            //obrenir donnees necessaires
            $formation = $this->Employees->FormationsEmployee->Formations->find()->where(['id' => $formation_employee->formation_id])->first();
            $formation_position = $this->Employees->FormationsEmployee->Formations->FormationsPosition->find()->where(['formation_id' => $formation->id])->first();
            $frequence = $this->Employees->FormationsEmployee->Formations->Frequences->find()->where(['id' => $formation->frequence_id])->first();
            $reminder = $this->Employees->FormationsEmployee->Formations->Reminders->find()->where(['id' => $formation->reminder_id])->first();
            $date_prevu = "";
            $nb_jours_expire = "";
            $nb_jours_a_venir = "";
            $a_faire = $formation_position->status_formation == 'NA' ? ($formation_position->status_formation == 'NA' ? "" : "À faire"):  "À faire";
            $jamais_fait = $formation_employee->date_executee != null ? "" : "Jamais Fait" ;

            //compute dates
            if($frequence->id == 1){
                $jamais_fait = ($formation_employee->date_executee == null) ? "Jamais Faite" : "";
                $a_faire = $jamais_fait == "" ? $jamais_fait : "À faire";
            } else {
                $date_prevu = $this->date_prevu($frequence->id, $formation_employee);
                $nb_jours = (date_diff(($today), date_create($date_prevu))->format("%R%a"));
                $symbole = substr($nb_jours, 0,1);
                if($symbole == '+'){ //aujourdhui est avant date prevue
                    $nb_jours_a_venir = $this->calcul_reminder($reminder, $formation_employee, $date_prevu) ? (int)$nb_jours : "";
                    $a_faire = $this->calcul_reminder($reminder, $formation_employee, $date_prevu) ? "À faire" : "";
                }else{//si aujourdhui est passe date prevu
                    $nb_jours_expire = (int)(date_diff(($today), date_create($date_prevu))->format("%a"));
                }
            }


//            switch ($frequence->id){
//                case 1:
//                    $a_faire = "";
//                    break;
//                case 2:
////                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("1 year")), "d-m-Y");
//                    echo  $this->date_prevu($frequence->id, $formation_employee);
//                    $date_prevu = $this->date_prevu($frequence->id, $formation_employee);
//                    $nb_jours = (date_diff(($today), date_create($date_prevu))->format("%R%a"));
//                    $symbole = substr($nb_jours, 0,1);
//                    echo $symbole . " " . $nb_jours ; //TODO transformer en str pour extraire le +/- et déterminer si on es t passé la date ??
//
//                    if($symbole == '+'){ //aujourdhui est avant date prevue
//                        $nb_jours_a_venir = (int)$nb_jours;
//                        $a_faire = $nb_jours_a_venir > 30 ? "" : "À faire";
//                    }else{//si aujourdhui est passe date prevu
//                        $nb_jours_expire = (int)(date_diff(($today), date_create($date_prevu))->format("%a"));
//                    }
//                    break;
////                case 3:
////                    // "2 year";
////                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("2 year")), "d-m-Y");
//////                    echo intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a"));
////                    if((int)(date_diff(date_create($today), date_create($date_prevu))->format("%R%a")) > 0){ //si aujourdhui est passe date prevu
////                        $nb_jours_expire = (int)(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
////                    } else { //aujourdhui est avant date prevue
////                        $nb_jours_a_venir = (int)(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
////                        $a_faire = $nb_jours_a_venir > 30 ? "" : "À faire";
////                    }
////                    break;
////                case 4:
////                    // "3 year";
////                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("3 year")), "d-m-Y");
//////                    echo intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a"));
////                    if((int)(date_diff(date_create($today), date_create($date_prevu))->format("%R%a")) > 0){ //si aujourdhui est passe date prevu
////                        $nb_jours_expire = (int)(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
////                    } else { //aujourdhui est avant date prevue
////                        $nb_jours_a_venir = (int)(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
////                        $a_faire = $nb_jours_a_venir > 30 ? "" : "À faire";
////                    }
////                    break;
////                case 5:
////                    // "5 year";
////                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("5 year")), "d-m-Y");
//////                    echo intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a"));
////                    if((int)(date_diff(date_create($today), date_create($date_prevu))->format("%R%a")) > 0){ //si aujourdhui est passe date prevu
////                        $nb_jours_expire = (int)(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
////                    } else { //aujourdhui est avant date prevue
////                        $nb_jours_a_venir = (int)(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
////                        $a_faire = $nb_jours_a_venir > 30 ? "" : "À faire";
////                    }
////                    break;
//            }

            //add tout dans larray temp
            $temp = [
                'titre' => $formation->titre,
                'status' => $formation_position->status_formation, //: formation_position
                'frequence' => $frequence->title,// : formation->frequence_id : frequences
                'date_fait' => date_format(date_create($formation_employee->date_executee), "d-m-Y") ,//: formation_employee
                'date_prevu' => $date_prevu, //: [calculer] frequence + date fait ??
                'expire_depuis' =>$nb_jours_expire . ($nb_jours_expire != ""? " jours" : ""),//: nb jours date auj - date prevu
                'a_venir_nb_jours' => $nb_jours_a_venir. ($nb_jours_a_venir != ""? " jours" : ""),//: nb jour date prev - date auj
                'a_faire' => $a_faire,//: est due ? [boolean]
                'jamais_fait' => $jamais_fait //: date fait est pas null ? [boolean]
            ];
            array_push($formations_array,$temp);
        }
        $donnees = ['employee' => $employee, 'formations_array' => $formations_array, 'location' => $location];
        return $donnees;
        //TODO changer le format de date Fait le
    }

    private function date_prevu($freq_id, $formation_employee){
        $date_prevu = Time::now();
        switch ($freq_id){
            case 1:
                $date_prevu = "";
                break;
            case 2:
                $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("1 year")), "d-m-Y");
                break;
            case 3:
                // "2 year";
                $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("2 year")), "d-m-Y");
                break;
            case 4:
                // "3 year";
                $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("3 year")), "d-m-Y");
                break;
            case 5:
                // "5 year";
                $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("5 year")), "d-m-Y");
                break;
        }
        return $date_prevu;
    }

    private function calcul_reminder($reminder, $formation_employee, $date_prevu){
        $date_reminder = Time::now();
        $do_reminder = false;
        switch ($reminder->id){
            case 1:
                $date_reminder = date_format(date_sub(date_create($date_prevu), date_interval_create_from_date_string("1 day")), "d-m-Y");
                $formation_employee->date_executee;
                $do_reminder = $formation_employee->date_executee;
                echo $date_prevu . '  ' . $date_reminder . "    ";
                break;
            case 2:
                $date_reminder = date_format(date_sub(date_create($date_prevu), date_interval_create_from_date_string("1 week")), "d-m-Y");
                echo $date_prevu . '  ' . $date_reminder . "    ";
                break;
            case 3:
                $date_reminder = date_format(date_sub(date_create($date_prevu), date_interval_create_from_date_string("1 month")), "d-m-Y");
                echo $date_prevu . '  ' . $date_reminder . "    ";
                break;
            case 4:
                $date_reminder = date_format(date_sub(date_create($date_prevu), date_interval_create_from_date_string("3 months")), "d-m-Y");
                echo $date_prevu . '  ' . $date_reminder . "    ";
                break;
            case 5:
                $date_reminder = date_format(date_add(date_sub(date_create($date_prevu), date_interval_create_from_date_string("1 year")), "d-m-Y"));
                echo $date_prevu . '  ' . $date_reminder . "    ";
                break;
        }

        //$nb_jours = (date_diff(date_create($date_reminder), date_create($date_prevu))->format("%R%a"));
        $nb_jours = (date_diff(date_create(Time::now()), date_create($date_reminder))->format("%R%a"));
        $symbole = substr($nb_jours, 0,1);
        echo "date diff: " . $nb_jours . "    ";
        if($symbole == '+'){ //aujourdhui est avant date du reminder
            $do_reminder = false;
        }else{//si aujourdhui est passe date du reminder
            $do_reminder = true;
        }

        return $do_reminder;
    }

    public function envoyerPlan($id){
        $employee = $this->Employees->get($id);
        (new HomeController())->sendEmail($employee->email, $employee);
        return $this->redirect(['action' => 'index']);
    }

}

