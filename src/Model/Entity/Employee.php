<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $last_name
 * @property int $user_id
 * @property int $position_id
 * @property int $Location_id
 * @property string|resource|null $formation_ids
 * @property string|resource|null $formation_infos
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Location $location
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
        'email' => true,
        'name' => true,
        'last_name' => true,
        'user_id' => true,
        'position_id' => true,
        'Location_id' => true,
        'formation_ids' => true,
        'formation_infos' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'position' => true,
        'location' => true
    ];
}
