<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * Employee Entity
 *
 * @property int $id
 * @property string|null $employee_number
 * @property int $civilite_id
 * @property string $name
 * @property string $last_name
 * @property int $language_id
 * @property int|null $cellphone
 * @property int|null $user_id
 * @property string $email
 * @property int $position_id
 * @property int $location_id
 * @property string|resource|null $extra_infos
 * @property \Cake\I18n\FrozenTime|null $formation_plan_last_sent
 * @property bool|null $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Civilitee $civilitee
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\FormationsEmployee[] $formations_employee
 */
class Employee extends Entity
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
        'employee_number' => true,
        'civilite_id' => true,
        'name' => true,
        'last_name' => true,
        'language_id' => true,
        'cellphone' => true,
        'user_id' => true,
        'email' => true,
        'position_id' => true,
        'location_id' => true,
        'extra_infos' => true,
        'formation_plan_last_sent' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'civilitee' => true,
        'language' => true,
        'users' => true,
        'positions' => true,
        'locations' => true,
        'formations_employee' => true
    ];


    protected function _getFullName(){
        return $this->_properties['name'] . " " . $this->_properties['last_name'];
    }
}
