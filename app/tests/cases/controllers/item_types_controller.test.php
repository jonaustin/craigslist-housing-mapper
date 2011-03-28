<?php 
/* SVN FILE: $Id$ */
/* ItemTypesController Test cases generated on: 2008-07-21 21:07:52 : 1216699252*/
App::import('Controller', 'ItemTypes');

class TestItemTypes extends ItemTypesController {
	var $autoRender = false;
}

class ItemTypesControllerTest extends CakeTestCase {
	var $ItemTypes = null;

	function setUp() {
		$this->ItemTypes = new TestItemTypes();
	}

	function testItemTypesControllerInstance() {
		$this->assertTrue(is_a($this->ItemTypes, 'ItemTypesController'));
	}

	function tearDown() {
		unset($this->ItemTypes);
	}
}
?>