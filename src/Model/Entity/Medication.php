<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medication Entity
 *
 * @property int $id
 * @property int $company_id
 * @property string $medication
 * @property string $cost
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Medicationcompany $medicationcompany
 * @property \App\Model\Entity\Prescriptionitem[] $prescriptionitems
 */
class Medication extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'company_id' => true,
        'medication' => true,
        'cost' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'medicationcompany' => true,
        'prescriptionitems' => true,
    ];
}
