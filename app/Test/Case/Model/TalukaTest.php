<?php
App::uses('Taluka', 'Model');

/**
 * Taluka Test Case
 *
 */
class TalukaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.taluka',
		'app.city',
		'app.state',
		'app.country',
		'app.district',
		'app.user_detail',
		'app.user',
		'app.group',
		'app.feedback',
		'app.subject',
		'app.prasang',
		'app.section',
		'app.with',
		'app.zone',
		'app.center',
		'app.author',
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
	public function setUp() {
		parent::setUp();
		$this->Taluka = ClassRegistry::init('Taluka');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Taluka);

		parent::tearDown();
	}

}
