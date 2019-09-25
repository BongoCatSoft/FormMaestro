<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProofsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProofsTable Test Case
 */
class ProofsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProofsTable
     */
    public $Proofs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Proofs',
        'app.FormationsEmployee',
        'app.FormationsPosition'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Proofs') ? [] : ['className' => ProofsTable::class];
        $this->Proofs = TableRegistry::getTableLocator()->get('Proofs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Proofs);

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
