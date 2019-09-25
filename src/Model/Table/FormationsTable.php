<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formations Model
 *
 * @property &\Cake\ORM\Association\HasMany $FormationsEmployee
 * @property &\Cake\ORM\Association\HasMany $FormationsPosition
 *
 * @method \App\Model\Entity\Formation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formation findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsTable extends Table
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

        $this->setTable('formations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('FormationsEmployee', [
            'foreignKey' => 'formation_id'
        ]);
        $this->hasMany('FormationsPosition', [
            'foreignKey' => 'formation_id'
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
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('categorie')
            ->maxLength('categorie', 255)
            ->requirePresence('categorie', 'create')
            ->notEmptyString('categorie');

        $validator
            ->scalar('frequence')
            ->maxLength('frequence', 255)
            ->requirePresence('frequence', 'create')
            ->notEmptyString('frequence');

        $validator
            ->scalar('debut_rappel')
            ->maxLength('debut_rappel', 255)
            ->requirePresence('debut_rappel', 'create')
            ->notEmptyString('debut_rappel');

        $validator
            ->scalar('modalite')
            ->maxLength('modalite', 255)
            ->requirePresence('modalite', 'create')
            ->notEmptyString('modalite');

        $validator
            ->integer('duree')
            ->requirePresence('duree', 'create')
            ->notEmptyString('duree');

        $validator
            ->scalar('remarque')
            ->maxLength('remarque', 255)
            ->allowEmptyString('remarque');

        return $validator;
    }
}
