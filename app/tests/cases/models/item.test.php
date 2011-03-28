<?php 
/* SVN FILE: $Id$ */
/* Item Test cases generated on: 2008-07-21 20:07:01 : 1216698721*/
App::import('Model', 'Item');

class TestItem extends Item {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class ItemTestCase extends CakeTestCase {
	var $Item = null;
	var $fixtures = array('app.item', 'app.item_type');

	function start() {
		parent::start();
		$this->Item = new TestItem();
	}

	function testItemInstance() {
		$this->assertTrue(is_a($this->Item, 'Item'));
	}

	function testItemFind() {
		$results = $this->Item->recursive = -1;
		$results = $this->Item->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Item' => array(
			'id'  => 1,
			'item_type_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'name_loc'  => 'Lorem ipsum dolor sit amet',
			'price'  => 1,
			'url'  => 'Lorem ipsum dolor sit amet',
			'date_posted'  => '2008-07-21',
			'created'  => '2008-07-21',
			'hasCats'  => 1,
			'hasDog'  => 1,
			'hasPic'  => 1,
			'bedrooms'  => 1,
			'county'  => 'L'
			));
		$this->assertEqual($results, $expected);
	}
}
?>