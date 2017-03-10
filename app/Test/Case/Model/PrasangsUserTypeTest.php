<?php

App::uses('PrasangsUserType', 'Model');

/**
 * PrasangsUserType Test Case
 *
 */
class PrasangsUserTypeTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.prasangs_user_type',
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
        'app.user_type'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->PrasangsUserType = ClassRegistry::init('PrasangsUserType');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrasangsUserType);

        parent::tearDown();
    }

}
