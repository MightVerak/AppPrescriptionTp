<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MedicationCompanies Model
 *
 * @method \App\Model\Entity\MedicationCompany get($primaryKey, $options = [])
 * @method \App\Model\Entity\MedicationCompany newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MedicationCompany[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MedicationCompany|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MedicationCompany saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MedicationCompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MedicationCompany[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MedicationCompany findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MedicationCompaniesTable extends Table
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

        $this->setTable('medication_companies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('company')
            ->maxLength('company', 255)
            ->requirePresence('company', 'create')
            ->notEmptyString('company');

        $validator
            ->scalar('details')
            ->maxLength('details', 255)
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

        return $validator;
    }
}
