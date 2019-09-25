<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationsPosition Model
 *
 * @property \App\Model\Table\PositionsTable&\Cake\ORM\Association\BelongsTo $Positions
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\BelongsTo $Formations
 * @property \App\Model\Table\ProofsTable&\Cake\ORM\Association\BelongsTo $Proofs
 *
 * @method \App\Model\Entity\FormationsPosition get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationsPosition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationsPosition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPosition|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsPosition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsPosition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPosition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPosition findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsPositionTable extends Table
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

        $this->setTable('formations_position');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id',
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
            ->scalar('status_formation')
            ->maxLength('status_formation', 25)
            ->requirePresence('status_formation', 'create')
            ->notEmptyString('status_formation');

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
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));
        $rules->add($rules->existsIn(['proof_id'], 'Proofs'));

        return $rules;
    }
}
