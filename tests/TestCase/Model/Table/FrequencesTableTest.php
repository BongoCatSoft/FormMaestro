<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrequencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrequencesTable Test Case
 */
class FrequencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrequencesTable
     */
    public $Frequences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Frequences',
        'app.Formations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Frequences') ? [] : ['className' => FrequencesTable::class];
        $this->Frequences = TableRegistry::getTableLocator()->get('Frequences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Frequences);

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
