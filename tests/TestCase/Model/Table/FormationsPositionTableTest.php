<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationsPositionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationsPositionTable Test Case
 */
class FormationsPositionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationsPositionTable
     */
    public $FormationsPosition;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FormationsPosition',
        'app.Positions',
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
        $config = TableRegistry::getTableLocator()->exists('FormationsPosition') ? [] : ['className' => FormationsPositionTable::class];
        $this->FormationsPosition = TableRegistry::getTableLocator()->get('FormationsPosition', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormationsPosition);

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
