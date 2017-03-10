<?php

App::uses('With', 'Model');

/**
 * With Test Case
 *
 */
class WithTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.with',
        'app.prasang',
        'app.section',
        'app.donor_zone',
        'app.donor_center',
        'app.author',
        'app.dtp_user',
        'app.user',
        'app.group',
        'app.feedback',
        'app.subject',
        'app.prasangs_subject',
        'app.reference',
        'app.reference_type',
        'app.references_subject',
        'app.user_detail',
        'app.user_type',
        'app.prasangs_user_type',
        'app.country',
        'app.state',
        'app.district',
        'app.taluka',
        'app.city',
        'app.zone',
        'app.center'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->With = ClassRegistry::init('With');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->With);

        parent::tearDown();
    }

}
