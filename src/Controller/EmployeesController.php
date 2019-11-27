<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Formation;
use phpDocumentor\Reflection\Types\Integer;

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
        $this->set(compact('employee', 'formations_array', 'location'));
    }

    public function getDonneesPlan($id){
        $formations_temp = $this->Employees->FormationsEmployee->find('all')->where(['employee_id' =>$id]);
        $employee = $this->Employees->get($id, []);
        $location = $this->Employees->Locations->find()->where(['id'=>$employee->location_id])->first();
        $formations_array = [];
        $today = date("d/m/y");
        foreach ($formations_temp as $formation_employee){
            //obrenir donnees necessaires
            $formation = $this->Employees->FormationsEmployee->Formations->find()->where(['id' => $formation_employee->formation_id])->first();
            $formation_position = $this->Employees->FormationsEmployee->Formations->FormationsPosition->find()->where(['formation_id' => $formation->id])->first();
            $frequence = $this->Employees->FormationsEmployee->Formations->Frequences->find()->where(['id' => $formation->frequence_id])->first();
            $date_prevu = "";
            $nb_jours_expire = "";
            $nb_jours_a_venir = "";
            $a_faire = $formation_position->status_formation == 'NA' ? ($formation_position->status_formation == 'NA' ? "" : "À faire"):  "À faire";
            $jamais_fait = $formation_employee->date_executee != null ? "" : "Jamais Fait" ;

            //compute dates
//            switch ($frequence->id){
//                case 1:
//                    $a_faire = "";
//                    break;
//                case 2:
//                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("1 year")), "Y-m-d");
////                    echo intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a"));
//                    if(intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a")) > 0){ //si aujourdhui est passe date prevu
//                        $nb_jours_expire = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                    } else { //aujourdhui est avant date prevue
//                        $nb_jours_a_venir = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                        $a_faire = intval($nb_jours_a_venir) > 30 ? "" : "À faire";
//                    }
//                    break;
//                case 3:
//                    // "2 year";
//                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("2 year")), "Y-m-d");
////                    echo intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a"));
//                    if(intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a")) > 0){ //si aujourdhui est passe date prevu
//                        $nb_jours_expire = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                    } else { //aujourdhui est avant date prevue
//                        $nb_jours_a_venir = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                        $a_faire = intval($nb_jours_a_venir) > 30 ? "" : "À faire";
//                    }
//                    break;
//                case 4:
//                    // "3 year";
//                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("3 year")), "Y-m-d");
////                    echo intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a"));
//                    if(intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a")) > 0){ //si aujourdhui est passe date prevu
//                        $nb_jours_expire = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                    } else { //aujourdhui est avant date prevue
//                        $nb_jours_a_venir = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                        $a_faire = intval($nb_jours_a_venir) > 30 ? "" : "À faire";
//                    }
//                    break;
//                case 5:
//                    // "5 year";
//                    $date_prevu = date_format(date_add(date_create($formation_employee->date_executee), date_interval_create_from_date_string("5 year")), "Y-m-d");
////                    echo intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a"));
//                    if(intval(date_diff(date_create($today), date_create($date_prevu))->format("%R%a")) > 0){ //si aujourdhui est passe date prevu
//                        $nb_jours_expire = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                    } else { //aujourdhui est avant date prevue
//                        $nb_jours_a_venir = intval(date_diff(date_create($today), date_create($date_prevu))->format("%a"));
//                        $a_faire = intval($nb_jours_a_venir) > 30 ? "" : "À faire";
//                    }
//                    break;
//            }

            //add tout dans larray temp
            $temp = [
                'titre' => $formation->titre,
                'status' => $formation_position->status_formation, //: formation_position
                'frequence' => $frequence->title,// : formation->frequence_id : frequences
                'date_fait' => $formation_employee->date_executee ,//: formation_employee
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

    public function envoyerPlan($id){
        $employee = $this->Employees->get($id);
        (new HomeController())->sendEmail($employee->email, $employee);
        return $this->redirect(['action' => 'index']);
    }
}
