<?php
App::uses('Client', 'Model');

/**
 * Client Test Case
 *
 */
class ClientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.client',
		'app.user',
		'app.ticket',
		'app.event',
		'app.stage',
		'app.concert',
		'app.band'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Client = ClassRegistry::init('Client');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Client);

		parent::tearDown();
	}

}
