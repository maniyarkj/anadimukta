<?php

App::uses('ReferencesSubject', 'Model');

/**
 * ReferencesSubject Test Case
 *
 */
class ReferencesSubjectTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.references_subject',
        'app.reference',
        'app.reference_type',
        'app.dtp_user',
        'app.user',
        'app.subject'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ReferencesSubject = ClassRegistry::init('ReferencesSubject');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReferencesSubject);

        parent::tearDown();
    }

}
