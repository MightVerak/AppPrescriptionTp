<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicationNamesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicationNamesTable Test Case
 */
class MedicationNamesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicationNamesTable
     */
    public $MedicationNames;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MedicationNames',
        'app.MedicationClasses',
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
        $config = TableRegistry::getTableLocator()->exists('MedicationNames') ? [] : ['className' => MedicationNamesTable::class];
        $this->MedicationNames = TableRegistry::getTableLocator()->get('MedicationNames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MedicationNames);

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
