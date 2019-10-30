<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formation Entity
 *
 * @property int $id
 * @property string $titre
 * @property string $categorie
 * @property int $frequence_id
 * @property int $reminder_id
 * @property int $modality_id
 * @property int $duree
 * @property string|null $remarque
 *
 * @property \App\Model\Entity\Frequence $frequence
 * @property \App\Model\Entity\Reminder $reminder
 * @property \App\Model\Entity\Modality $modality
 * @property \App\Model\Entity\FormationsEmployee[] $formations_employee
 * @property \App\Model\Entity\FormationsPosition[] $formations_position
 */
class Formation extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'titre' => true,
        'categorie' => true,
        'frequence_id' => true,
        'reminder_id' => true,
        'modality_id' => true,
        'duree' => true,
        'remarque' => true,
        'frequence' => true,
        'reminder' => true,
        'modality' => true,
        'formations_employee' => true,
        'formations_position' => true
    ];
}
