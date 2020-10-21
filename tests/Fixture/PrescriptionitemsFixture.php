<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrescriptionItemsFixture
 */
class PrescriptionItemsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'prescription_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'medication_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'medication_id' => ['type' => 'index', 'columns' => ['medication_id'], 'length' => []],
            'prescription_id' => ['type' => 'index', 'columns' => ['prescription_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'prescription_id', 'medication_id'], 'length' => []],
            'medication_fk' => ['type' => 'foreign', 'columns' => ['medication_id'], 'references' => ['medications', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'prescription_fk' => ['type' => 'foreign', 'columns' => ['prescription_id'], 'references' => ['prescriptions', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'prescription_id' => 1,
                'medication_id' => 1,
                'quantity' => 1,
                'created' => '2020-10-14 15:55:25',
                'modified' => '2020-10-14 15:55:25',
            ],
        ];
        parent::init();
    }
}
