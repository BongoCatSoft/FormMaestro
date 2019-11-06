<?php
echo $this->Html->css('/css/planFormation',['block'=>true]);
echo "<h1>Plan de formation</h1>";
//echo <img src
echo "<h2>Employé</h2>";
    echo "Numéro d'employé :" . $employee->employee_number;
    echo "Prénom :" . $employee->name;
    echo "Nom :" . $employee->last_name;
    echo "Immeuble" . $location->address . ", " . $location->postal_code;
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
echo "<h6>Imprimé le " . date("Y/m/d", "H:i:s") . "</h6>";



