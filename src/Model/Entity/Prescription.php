<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prescription Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $physician_id
 * @property string $details
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Physician $physician
 * @property \App\Model\Entity\PrescriptionItem[] $prescriptionitems
 */
class Prescription extends Entity
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
        'customer_id' => true,
        'physician_id' => true,
        'details' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'physician' => true,
        'prescriptionitems' => true,
    ];
}
