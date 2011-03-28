<?php 
/* SVN FILE: $Id$ */
/* SearchesController Test cases generated on: 2008-07-21 21:07:23 : 1216699283*/
App::import('Controller', 'Searches');

class TestSearches extends SearchesController {
	var $autoRender = false;
}

class SearchesControllerTest extends CakeTestCase {
	var $Searches = null;

	function setUp() {
		$this->Searches = new TestSearches();
	}

	function testSearchesControllerInstance() {
		$this->assertTrue(is_a($this->Searches, 'SearchesController'));
	}

	function tearDown() {
		unset($this->Searches);
	}
}
?>