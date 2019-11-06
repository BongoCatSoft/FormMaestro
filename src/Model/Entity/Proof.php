<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proof Entity
 *
 * @property int $id
 * @property string $original_file_name
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\FormationsEmployee[] $formations_employee
 * @property \App\Model\Entity\FormationsPosition[] $formations_position
 */
class Proof extends Entity
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
        'original_file_name' => true,
        'created' => true,
        'formations_employee' => true,
        'formations_position' => true
    ];
}
