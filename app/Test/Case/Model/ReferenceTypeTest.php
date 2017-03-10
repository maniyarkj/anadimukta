<?php
App::uses('ReferenceType', 'Model');

/**
 * ReferenceType Test Case
 *
 */
class ReferenceTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reference_type',
		'app.reference',
		'app.dtp_user',
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
		'app.prasangs_subject',
		'app.user_type',
		'app.user_detail',
		'app.country',
		'app.city',
		'app.state',
		'app.Country',
		'app.district',
		'app.taluka',
		'app.zone',
		'app.center',
		'app.prasangs_user_type',
		'app.references_subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ReferenceType = ClassRegistry::init('ReferenceType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ReferenceType);

		parent::tearDown();
	}

}
