<?php

/**
 * PrasangFixture
 *
 */
class PrasangFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'section_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'with_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'grade' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'date' => array('type' => 'date', 'null' => true, 'default' => null),
        'place' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'event' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'content_english' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'content_hindi' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'content_gujarati' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'notes' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'is_personal' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
        'donor_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'donor_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'donor_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'donor_zone_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'donor_center_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'author_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'is_rewrite' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'is pransag in rewrite'),
        'rewrite_date' => array('type' => 'date', 'null' => true, 'default' => null),
        'has_proof' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
        'proof_date' => array('type' => 'date', 'null' => true, 'default' => null),
        'x_publish_date' => array('type' => 'date', 'null' => true, 'default' => null, 'comment' => 'approximate publish date'),
        'status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => '1. Uploaded, 2. In Rewrite, 3. In Review, 4. In Approval, 5. Published'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => 'CURRENT_TIMESTAMP'),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'published' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'dtp_user_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'DTP User id from user table'),
        'published_by' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'admin user id from user id'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => 1,
            'section_id' => 1,
            'with_id' => 1,
            'grade' => 'Lorem ipsum dolor sit ame',
            'title' => 'Lorem ipsum dolor sit amet',
            'date' => '2015-06-20',
            'place' => 'Lorem ipsum dolor sit amet',
            'event' => 'Lorem ipsum dolor sit amet',
            'content_english' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'content_hindi' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'content_gujarati' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'is_personal' => 1,
            'donor_name' => 'Lorem ipsum dolor sit amet',
            'donor_phone' => 'Lorem ipsum dolor ',
            'donor_email' => 'Lorem ipsum dolor sit amet',
            'donor_zone_id' => 1,
            'donor_center_id' => 1,
            'author_id' => 1,
            'is_rewrite' => 1,
            'rewrite_date' => '2015-06-20',
            'has_proof' => 1,
            'proof_date' => '2015-06-20',
            'x_publish_date' => '2015-06-20',
            'status' => 1,
            'created' => '2015-06-20 08:28:33',
            'modified' => '2015-06-20 08:28:33',
            'published' => '2015-06-20 08:28:33',
            'dtp_user_id' => 1,
            'published_by' => 1
        ),
    );

}
