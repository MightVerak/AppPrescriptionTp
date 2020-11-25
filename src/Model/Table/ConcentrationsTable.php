<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Concentrations Model
 *
 * @property \App\Model\Table\MedicationsTable&\Cake\ORM\Association\BelongsTo $Medications
 *
 * @method \App\Model\Entity\Concentration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Concentration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Concentration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Concentration|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concentration saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concentration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Concentration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Concentration findOrCreate($search, callable $callback = null, $options = [])
 */
class ConcentrationsTable extends Table
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

        $this->setTable('concentrations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Medications', [
            'foreignKey' => 'medication_id',
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
            ->scalar('concentration')
            ->maxLength('concentration', 255)
            ->requirePresence('concentration', 'create')
            ->notEmptyString('concentration');

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
        $rules->add($rules->existsIn(['medication_id'], 'Medications'));

        return $rules;
    }
}
