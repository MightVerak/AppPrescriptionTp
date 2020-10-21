<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrescriptionItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrescriptionItemsTable Test Case
 */
class PrescriptionItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrescriptionItemsTable
     */
    public $PrescriptionItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PrescriptionItems',
        'app.Prescriptions',
        'app.Medications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrescriptionItems') ? [] : ['className' => PrescriptionItemsTable::class];
        $this->PrescriptionItems = TableRegistry::getTableLocator()->get('PrescriptionItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrescriptionItems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
