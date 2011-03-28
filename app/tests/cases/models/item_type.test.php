<?php 
/* SVN FILE: $Id$ */
/* ItemType Test cases generated on: 2008-07-21 20:07:28 : 1216698148*/
App::import('Model', 'ItemType');

class TestItemType extends ItemType {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class ItemTypeTestCase extends CakeTestCase {
	var $ItemType = null;
	var $fixtures = array('app.item_type', 'app.item');

	function start() {
		parent::start();
		$this->ItemType = new TestItemType();
	}

	function testItemTypeInstance() {
		$this->assertTrue(is_a($this->ItemType, 'ItemType'));
	}

	function testItemTypeFind() {
		$results = $this->ItemType->recursive = -1;
		$results = $this->ItemType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ItemType' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'value'  => 'L'
			));
		$this->assertEqual($results, $expected);
	}
}
?>