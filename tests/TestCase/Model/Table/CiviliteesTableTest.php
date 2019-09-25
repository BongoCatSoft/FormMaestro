<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiviliteesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiviliteesTable Test Case
 */
class CiviliteesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CiviliteesTable
     */
    public $Civilitees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Civilitees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Civilitees') ? [] : ['className' => CiviliteesTable::class];
        $this->Civilitees = TableRegistry::getTableLocator()->get('Civilitees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Civilitees);

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
