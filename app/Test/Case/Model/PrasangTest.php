<?php

App::uses('Prasang', 'Model');

/**
 * Prasang Test Case
 *
 */
class PrasangTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.prasang',
        'app.section',
        'app.with',
        'app.donor_zone',
        'app.donor_center',
        'app.author',
        'app.dtp_user',
        'app.user',
        'app.subject',
        'app.prasangs_subject',
        'app.user_type',
        'app.prasangs_user_type'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Prasang = ClassRegistry::init('Prasang');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prasang);

        parent::tearDown();
    }

}
