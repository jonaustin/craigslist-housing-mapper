<?php 
/* SVN FILE: $Id$ */
/* ItemsSearchesController Test cases generated on: 2008-07-21 21:07:01 : 1216699261*/
App::import('Controller', 'ItemsSearches');

class TestItemsSearches extends ItemsSearchesController {
	var $autoRender = false;
}

class ItemsSearchesControllerTest extends CakeTestCase {
	var $ItemsSearches = null;

	function setUp() {
		$this->ItemsSearches = new TestItemsSearches();
	}

	function testItemsSearchesControllerInstance() {
		$this->assertTrue(is_a($this->ItemsSearches, 'ItemsSearchesController'));
	}

	function tearDown() {
		unset($this->ItemsSearches);
	}
}
?>