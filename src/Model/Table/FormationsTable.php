<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formations Model
 *
 * @property \App\Model\Table\FrequencesTable&\Cake\ORM\Association\BelongsTo $Frequences
 * @property \App\Model\Table\RemindersTable&\Cake\ORM\Association\BelongsTo $Reminders
 * @property \App\Model\Table\ModalitiesTable&\Cake\ORM\Association\BelongsTo $Modalities
 * @property \App\Model\Table\FormationsEmployeeTable&\Cake\ORM\Association\HasMany $FormationsEmployee
 * @property \App\Model\Table\FormationsPositionTable&\Cake\ORM\Association\HasMany $FormationsPosition
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

        $this->belongsTo('Frequences', [
            'foreignKey' => 'frequence_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Reminders', [
            'foreignKey' => 'reminder_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modalities', [
            'foreignKey' => 'modality_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('duree')
            ->requirePresence('duree', 'create')
            ->notEmptyString('duree');

        $validator
            ->scalar('remarque')
            ->maxLength('remarque', 255)
            ->allowEmptyString('remarque');

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
        $rules->add($rules->existsIn(['frequence_id'], 'Frequences'));
        $rules->add($rules->existsIn(['reminder_id'], 'Reminders'));
        $rules->add($rules->existsIn(['modality_id'], 'Modalities'));

        return $rules;
    }
}
