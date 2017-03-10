<?php

App::uses('Country', 'Model');

/**
 * Country Test Case
 *
 */
class CountryTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.country',
        'app.city',
        'app.state',
        'app.district',
        'app.user_detail',
        'app.user',
        'app.group',
        'app.feedback',
        'app.subject',
        'app.prasang',
        'app.section',
        'app.with',
        'app.donor_zone',
        'app.donor_center',
        'app.author',
        'app.dtp_user',
        'app.prasangs_subject',
        'app.user_type',
        'app.prasangs_user_type',
        'app.reference',
        'app.reference_type',
        'app.references_subject',
        'app.taluka',
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
        $this->Country = ClassRegistry::init('Country');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Country);

        parent::tearDown();
    }

}
