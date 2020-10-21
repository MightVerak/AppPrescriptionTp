<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicationCompaniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicationCompaniesTable Test Case
 */
class MedicationCompaniesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicationCompaniesTable
     */
    public $MedicationCompanies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MedicationCompanies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MedicationCompanies') ? [] : ['className' => MedicationCompaniesTable::class];
        $this->MedicationCompanies = TableRegistry::getTableLocator()->get('MedicationCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MedicationCompanies);

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
}
