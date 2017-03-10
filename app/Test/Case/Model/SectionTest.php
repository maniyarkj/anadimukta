<?php

App::uses('Section', 'Model');

/**
 * Section Test Case
 *
 */
class SectionTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.section',
        'app.prasang',
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
        $this->Section = ClassRegistry::init('Section');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Section);

        parent::tearDown();
    }

}
