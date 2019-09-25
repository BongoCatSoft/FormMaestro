<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Civilitees Model
 *
 * @method \App\Model\Entity\Civilitee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Civilitee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Civilitee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Civilitee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civilitee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civilitee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Civilitee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Civilitee findOrCreate($search, callable $callback = null, $options = [])
 */
class CiviliteesTable extends Table
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

        $this->setTable('civilitees');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('civilite')
            ->maxLength('civilite', 25)
            ->requirePresence('civilite', 'create')
            ->notEmptyString('civilite');

        return $validator;
    }
}
