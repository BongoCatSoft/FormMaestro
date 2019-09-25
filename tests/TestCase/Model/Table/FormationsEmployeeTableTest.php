<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationsEmployeeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationsEmployeeTable Test Case
 */
class FormationsEmployeeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationsEmployeeTable
     */
    public $FormationsEmployee;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FormationsEmployee',
        'app.Employees',
        'app.Formations',
        'app.Proofs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FormationsEmployee') ? [] : ['className' => FormationsEmployeeTable::class];
        $this->FormationsEmployee = TableRegistry::getTableLocator()->get('FormationsEmployee', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormationsEmployee);

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
