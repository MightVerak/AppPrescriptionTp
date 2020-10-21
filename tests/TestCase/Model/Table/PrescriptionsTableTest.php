<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrescriptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrescriptionsTable Test Case
 */
class PrescriptionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrescriptionsTable
     */
    public $Prescriptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Prescriptions',
        'app.Customers',
        'app.Physicians',
        'app.Prescriptionitems',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Prescriptions') ? [] : ['className' => PrescriptionsTable::class];
        $this->Prescriptions = TableRegistry::getTableLocator()->get('Prescriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prescriptions);

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
