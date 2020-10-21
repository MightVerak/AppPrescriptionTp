<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Physician Entity
 *
 * @property int $id
 * @property int $address_id
 * @property string $physician_name
 * @property string|null $details
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Prescription[] $prescriptions
 * @property \App\Model\Entity\Customer[] $customers
 */
class Physician extends Entity
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
        'address_id' => true,
        'physician_name' => true,
        'details' => true,
        'created' => true,
        'modified' => true,
        'address' => true,
        'prescriptions' => true,
        'customers' => true,
    ];
}
