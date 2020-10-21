<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhysiciansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhysiciansTable Test Case
 */
class PhysiciansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PhysiciansTable
     */
    public $Physicians;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Physicians',
        'app.Addresses',
        'app.Prescriptions',
        'app.Customers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Physicians') ? [] : ['className' => PhysiciansTable::class];
        $this->Physicians = TableRegistry::getTableLocator()->get('Physicians', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Physicians);

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
