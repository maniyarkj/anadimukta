<?php

App::uses('FeedbackSubject', 'Model');

/**
 * FeedbackSubject Test Case
 *
 */
class FeedbackSubjectTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.feedback_subject'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->FeedbackSubject = ClassRegistry::init('FeedbackSubject');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FeedbackSubject);

        parent::tearDown();
    }

}
