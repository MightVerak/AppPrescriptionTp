<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Concentration Entity
 *
 * @property int $id
 * @property int|null $medication_id
 * @property string $concentration
 *
 * @property \App\Model\Entity\Medication $medication
 */
class Concentration extends Entity
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
        'medication_id' => true,
        'concentration' => true,
        'medication' => true,
    ];
}
