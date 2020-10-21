<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prescriptions Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\PhysiciansTable&\Cake\ORM\Association\BelongsTo $Physicians
 * @property &\Cake\ORM\Association\HasMany $PrescriptionItems
 *
 * @method \App\Model\Entity\Prescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrescriptionsTable extends Table
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

        $this->setTable('prescriptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Physicians', [
            'foreignKey' => 'physician_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PrescriptionItems', [
            'foreignKey' => 'prescription_id',
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
            ->scalar('details')
            ->maxLength('details', 255)
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['physician_id'], 'Physicians'));

        return $rules;
    }
}
