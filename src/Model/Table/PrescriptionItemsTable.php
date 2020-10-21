<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrescriptionItems Model
 *
 * @property \App\Model\Table\PrescriptionsTable&\Cake\ORM\Association\BelongsTo $Prescriptions
 * @property \App\Model\Table\MedicationsTable&\Cake\ORM\Association\BelongsTo $Medications
 *
 * @method \App\Model\Entity\PrescriptionItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrescriptionItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrescriptionItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrescriptionItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrescriptionItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrescriptionItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrescriptionItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrescriptionItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrescriptionItemsTable extends Table
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

        $this->setTable('prescription_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'prescription_id', 'medication_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Prescriptions', [
            'foreignKey' => 'prescription_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Medications', [
            'foreignKey' => 'medication_id',
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn(['medication_id'], 'Medications'));

        return $rules;
    }
}
