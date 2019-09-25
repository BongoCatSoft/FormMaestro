<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FormationsPositionFixture
 */
class FormationsPositionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'formations_position';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'position_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'formation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'proof_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status_formation' => ['type' => 'string', 'length' => 25, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'formation_id_position' => ['type' => 'index', 'columns' => ['formation_id'], 'length' => []],
            'proof_id_position' => ['type' => 'index', 'columns' => ['position_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'formation_id_position' => ['type' => 'foreign', 'columns' => ['formation_id'], 'references' => ['formations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'position_id_position' => ['type' => 'foreign', 'columns' => ['position_id'], 'references' => ['positions', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'proof_id_position' => ['type' => 'foreign', 'columns' => ['position_id'], 'references' => ['proofs', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'position_id' => 1,
                'formation_id' => 1,
                'proof_id' => 1,
                'status_formation' => 'Lorem ipsum dolor sit a'
            ],
        ];
        parent::init();
    }
}
