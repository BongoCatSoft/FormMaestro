<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FormationsEmployeeFixture
 */
class FormationsEmployeeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'formations_employee';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'formation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date_executee' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'proof_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'employee_id' => ['type' => 'index', 'columns' => ['employee_id'], 'length' => []],
            'formation_id' => ['type' => 'index', 'columns' => ['formation_id'], 'length' => []],
            'proof_id' => ['type' => 'index', 'columns' => ['proof_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'employee_id' => ['type' => 'foreign', 'columns' => ['employee_id'], 'references' => ['employees', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'formation_id' => ['type' => 'foreign', 'columns' => ['formation_id'], 'references' => ['formations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'proof_id' => ['type' => 'foreign', 'columns' => ['proof_id'], 'references' => ['proofs', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'employee_id' => 1,
                'formation_id' => 1,
                'date_executee' => '2019-09-25',
                'proof_id' => 1
            ],
        ];
        parent::init();
    }
}
