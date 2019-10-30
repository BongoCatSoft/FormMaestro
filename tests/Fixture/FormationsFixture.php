<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FormationsFixture
 */
class FormationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'titre' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'categorie' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'frequence_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reminder_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modality_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'duree' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'remarque' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'frequence_id' => ['type' => 'index', 'columns' => ['frequence_id'], 'length' => []],
            'reminder_id' => ['type' => 'index', 'columns' => ['reminder_id'], 'length' => []],
            'modality_id' => ['type' => 'index', 'columns' => ['modality_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'formations_ibfk_2' => ['type' => 'foreign', 'columns' => ['reminder_id'], 'references' => ['reminders', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'formations_ibfk_3' => ['type' => 'foreign', 'columns' => ['modality_id'], 'references' => ['modalities', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'formations_ibfk_4' => ['type' => 'foreign', 'columns' => ['frequence_id'], 'references' => ['frequences', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'titre' => 'Lorem ipsum dolor sit amet',
                'categorie' => 'Lorem ipsum dolor sit amet',
                'frequence_id' => 1,
                'reminder_id' => 1,
                'modality_id' => 1,
                'duree' => 1,
                'remarque' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
