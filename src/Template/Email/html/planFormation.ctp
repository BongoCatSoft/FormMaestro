<?php
echo $this->Html->css('/css/planFormation',['block'=>true]);
echo "<h1>Plan de formation</h1>";
echo "<h2>Employé</h2>";
    echo "Prénom :" . $employee->name;
    echo "Nom :" . $employee->last_name;
    echo "Numéro d'employé :" . $employee->employee_number;
    echo "Date du derneir envoi du plan de formation :" . $employee->formation_plan_last_sent;
    echo "\n\n";

echo "<h2>Formations</h2>";
echo "<table style='width:100%'>";
echo
"
    <tr>
        <th>Titre de la formation</th>
        <th>Date de la dernière complétion</th>
        <th>Fréquence de la formation</th>
        <th>Durée</th>
        <th>Modalité</th>
    </tr>
  ";
foreach ($formations as $formation) :
echo
  "
    <tr>
        <td>" . $formation->titre . "</td>
        <td>" . $formation->date_last_sent . "</td>
        <td>" . $formation->frequence . "</td>
        <td>" . $formation->duree . "</td>
        <td>" . $formation->modalite . "</td>
    </tr>
  ";
endforeach;
echo "</table>";
echo "\n\n";
echo "<h6>Créé et envoyé par Formaestro, un logiciel de BongoCatSoft</h6>";



