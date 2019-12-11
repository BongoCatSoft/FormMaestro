<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationsEmployee Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\BelongsTo $Formations
 * @property \App\Model\Table\ProofsTable&\Cake\ORM\Association\BelongsTo $Proofs
 *
 * @method \App\Model\Entity\FormationsEmployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationsEmployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationsEmployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationsEmployee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsEmployee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsEmployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsEmployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsEmployee findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsEmployeeTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('formations_employee');
        $this->setDisplayField('formation_id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Formations', [
            'foreignKey' => 'formation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Proofs', [
            'foreignKey' => 'proof_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('date_executee')
            ->allowEmptyDate('date_executee');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));
        $rules->add($rules->existsIn(['proof_id'], 'Proofs'));

        return $rules;
    }
}
