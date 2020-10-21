<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $address_id
 * @property string $customer_name
 * @property string $slug
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Prescription[] $prescriptions
 * @property \App\Model\Entity\Physician[] $physicians
 */
class Customer extends Entity
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
        'user_id' => true,
        'address_id' => true,
        'customer_name' => true,
        'slug' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'address' => true,
        'prescriptions' => true,
        'physicians' => true,
		'files' => true,
    ];
}
