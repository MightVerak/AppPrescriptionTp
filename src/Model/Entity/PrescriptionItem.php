<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrescriptionItem Entity
 *
 * @property int $id
 * @property int $prescription_id
 * @property int $medication_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Prescription $prescription
 * @property \App\Model\Entity\Medication $medication
 */
class PrescriptionItem extends Entity
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
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'prescription' => true,
        'medication' => true,
    ];
}
