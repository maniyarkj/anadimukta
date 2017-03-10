<?php

App::uses('PrasangsSubject', 'Model');

/**
 * PrasangsSubject Test Case
 *
 */
class PrasangsSubjectTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.prasangs_subject',
        'app.prasang',
        'app.section',
        'app.with',
        'app.donor_zone',
        'app.donor_center',
        'app.author',
        'app.dtp_user',
        'app.user',
        'app.subject',
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
        $this->PrasangsSubject = ClassRegistry::init('PrasangsSubject');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrasangsSubject);

        parent::tearDown();
    }

}
