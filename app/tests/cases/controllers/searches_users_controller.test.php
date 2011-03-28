<?php 
/* SVN FILE: $Id$ */
/* SearchesUsersController Test cases generated on: 2008-07-21 21:07:29 : 1216699289*/
App::import('Controller', 'SearchesUsers');

class TestSearchesUsers extends SearchesUsersController {
	var $autoRender = false;
}

class SearchesUsersControllerTest extends CakeTestCase {
	var $SearchesUsers = null;

	function setUp() {
		$this->SearchesUsers = new TestSearchesUsers();
	}

	function testSearchesUsersControllerInstance() {
		$this->assertTrue(is_a($this->SearchesUsers, 'SearchesUsersController'));
	}

	function tearDown() {
		unset($this->SearchesUsers);
	}
}
?>