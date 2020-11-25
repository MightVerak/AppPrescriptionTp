<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medication Entity
 *
 * @property int $id
 * @property int $prescription_id
 * @property string $medication
 * @property string $description
 *
 * @property \App\Model\Entity\PrescriptionItem[] $prescription_items
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
        'prescription_id' => true,
        'medication' => true,
        'description' => true,
        'prescription_items' => true,
    ];
}
