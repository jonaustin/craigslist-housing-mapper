<?php 
/* SVN FILE: $Id$ */
/* ItemsController Test cases generated on: 2008-07-21 20:07:59 : 1216699019*/
App::import('Controller', 'Items');

class TestItems extends ItemsController {
	var $autoRender = false;
}

class ItemsControllerTest extends CakeTestCase {
	var $Items = null;

	function setUp() {
		$this->Items = new TestItems();
	}

	function testItemsControllerInstance() {
		$this->assertTrue(is_a($this->Items, 'ItemsController'));
	}

	function tearDown() {
		unset($this->Items);
	}
}
?>