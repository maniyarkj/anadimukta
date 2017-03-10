<?php

App::uses('Subject', 'Model');

/**
 * Subject Test Case
 *
 */
class SubjectTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.subject',
        'app.prasang',
        'app.section',
        'app.with',
        'app.donor_zone',
        'app.donor_center',
        'app.author',
        'app.dtp_user',
        'app.user',
        'app.prasangs_subject',
        'app.user_type',
        'app.prasangs_user_type',
        'app.reference',
        'app.reference_type',
        'app.references_subject'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Subject = ClassRegistry::init('Subject');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subject);

        parent::tearDown();
    }

}
