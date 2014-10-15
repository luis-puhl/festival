<?php
App::uses('Concert', 'Model');

/**
 * Concert Test Case
 *
 */
class ConcertTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.concert',
		'app.stage',
		'app.event',
		'app.band'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Concert = ClassRegistry::init('Concert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Concert);

		parent::tearDown();
	}

}
