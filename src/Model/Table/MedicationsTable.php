<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medications Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $Prescriptions
 * @property &\Cake\ORM\Association\HasMany $Concentrations
 * @property &\Cake\ORM\Association\HasMany $Prescriptions
 *
 * @method \App\Model\Entity\Medication get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medication newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Medication[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medication|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medication saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medication[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medication findOrCreate($search, callable $callback = null, $options = [])
 */
class MedicationsTable extends Table
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

        $this->setTable('medications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Prescriptions', [
            'foreignKey' => 'prescription_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Concentrations', [
            'foreignKey' => 'medication_id',
        ]);
        $this->hasMany('Prescriptions', [
            'foreignKey' => 'medication_id',
        ]);
		$this->belongsTo('Categories', [
			'foreignKey' => 'category_id',
			'joinType' => 'INNER',
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
            ->scalar('medication')
            ->maxLength('medication', 255)
            ->requirePresence('medication', 'create')
            ->notEmptyString('medication');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
        $rules->add($rules->existsIn(['prescription_id'], 'Prescriptions'));

        return $rules;
    }
}
