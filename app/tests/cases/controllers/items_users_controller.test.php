<?php 
/* SVN FILE: $Id$ */
/* ItemsUsersController Test cases generated on: 2008-07-21 21:07:12 : 1216699272*/
App::import('Controller', 'ItemsUsers');

class TestItemsUsers extends ItemsUsersController {
	var $autoRender = false;
}

class ItemsUsersControllerTest extends CakeTestCase {
	var $ItemsUsers = null;

	function setUp() {
		$this->ItemsUsers = new TestItemsUsers();
	}

	function testItemsUsersControllerInstance() {
		$this->assertTrue(is_a($this->ItemsUsers, 'ItemsUsersController'));
	}

	function tearDown() {
		unset($this->ItemsUsers);
	}
}
?>