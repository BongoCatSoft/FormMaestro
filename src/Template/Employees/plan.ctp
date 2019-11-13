<?php
echo $this->Html->css('/css/planFormation',['block'=>true]);
echo $this->Html->link(__('Retour'), ['action' => 'index']);
echo "<br>";
echo $this->Html->image('/webroot/logo.jpg');
echo "<h1>Plan de formation</h1>";
echo "<h2>Employé</h2>";
    echo "Numéro d'employé :" . $employee->employee_number . '<br>';
    echo "Prénom :" . $employee->name . '<br>';
    echo "Nom :" . $employee->last_name . '<br>';
    echo "Immeuble :" . $location['address'] . ", " . $location['postal_code'] . '<br>';
    echo "\n\n";


echo "<h2>Formations</h2>";
echo "<table style='width:100%'>";
echo
"
    <tr>
        <th>Formation</th>
        <th>Statut</th>
        <th>Fréquence</th>
        <th>Fait le</th>
        <th>Prévue le</th>
        <th>Expirée depuis</th>
        <th>À venir dans</th>
        <th>À faire dans</th>
        <th>Jamais faite</th>
    </tr>
  ";
foreach ($formations_array as $formation) :
echo
  "
    <tr>
        <td>" . $formation['titre'] . "</td>
        <td>" . $formation['status'] . "</td>
        <td>" . $formation['frequence'] . "</td>
        <td>" . $formation['date_fait'] . "</td>
        <td>" . $formation['date_prevu'] . "</td>
        <td>" . $formation['expire_depuis'] . " jours" . "</td>
        <td>" . $formation['a_venir_nb_jours'] . " jours" . "</td>
        <td>" . $formation['a_faire'] . "</td>
        <td>" . $formation['jamais_fait'] . "</td>
    </tr>
  ";
endforeach;
echo "</table>";
echo $this->Html->link(__("Envoyer le plan de formation à l'employé"), ['action' => 'envoyerPlan', $employee->id]);
echo "\n\n";
echo "<h6>Créé et envoyé par Formaestro, un logiciel de BongoCatSoft</h6>";
echo "<h6>Imprimé le " . date("Y/m/d") . "</h6>";



