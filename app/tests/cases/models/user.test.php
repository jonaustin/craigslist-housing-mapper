<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2008-07-21 20:07:07 : 1216698907*/
App::import('Model', 'User');

class TestUser extends User {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user');

	function start() {
		parent::start();
		$this->User = new TestUser();
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$results = $this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'user_type'  => 'Lorem ipsum dolor ',
			'email'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2008-07-21 20:55:07'
			));
		$this->assertEqual($results, $expected);
	}
}
?>