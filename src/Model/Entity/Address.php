<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string|null $number_building
 * @property string $number_street
 * @property string|null $area_locality
 * @property string $city
 * @property string $zip_code
 * @property string $state_province
 * @property string $country
 * @property string|null $other_details
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Physician[] $physicians
 */
class Address extends Entity
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
        'number_building' => true,
        'number_street' => true,
        'area_locality' => true,
        'city' => true,
        'zip_code' => true,
        'state_province' => true,
        'country' => true,
        'other_details' => true,
        'created' => true,
        'modified' => true,
        'customers' => true,
        'physicians' => true,
    ];
}
