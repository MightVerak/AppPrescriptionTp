<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Physicians Model
 *
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\PrescriptionsTable&\Cake\ORM\Association\HasMany $Prescriptions
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsToMany $Customers
 *
 * @method \App\Model\Entity\Physician get($primaryKey, $options = [])
 * @method \App\Model\Entity\Physician newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Physician[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Physician|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Physician saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Physician patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Physician[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Physician findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhysiciansTable extends Table
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

        $this->setTable('physicians');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Prescriptions', [
            'foreignKey' => 'physician_id',
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'physician_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'customers_physicians',
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
            ->scalar('physician_name')
            ->maxLength('physician_name', 255)
            ->requirePresence('physician_name', 'create')
            ->notEmptyString('physician_name');

        $validator
            ->scalar('details')
            ->maxLength('details', 255)
            ->allowEmptyString('details');

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
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }
}
