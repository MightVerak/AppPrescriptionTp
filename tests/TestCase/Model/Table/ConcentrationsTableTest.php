<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConcentrationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConcentrationsTable Test Case
 */
class ConcentrationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConcentrationsTable
     */
    public $Concentrations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Concentrations',
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
        $config = TableRegistry::getTableLocator()->exists('Concentrations') ? [] : ['className' => ConcentrationsTable::class];
        $this->Concentrations = TableRegistry::getTableLocator()->get('Concentrations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Concentrations);

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
