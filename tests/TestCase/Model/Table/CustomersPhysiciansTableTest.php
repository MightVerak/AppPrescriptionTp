<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersPhysiciansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersPhysiciansTable Test Case
 */
class CustomersPhysiciansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersPhysiciansTable
     */
    public $CustomersPhysicians;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CustomersPhysicians',
        'app.Customers',
        'app.Physicians',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CustomersPhysicians') ? [] : ['className' => CustomersPhysiciansTable::class];
        $this->CustomersPhysicians = TableRegistry::getTableLocator()->get('CustomersPhysicians', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersPhysicians);

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
