<?php 
/* SVN FILE: $Id$ */
/* ItemsSearch Test cases generated on: 2008-07-21 20:07:37 : 1216698757*/
App::import('Model', 'ItemsSearch');

class TestItemsSearch extends ItemsSearch {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class ItemsSearchTestCase extends CakeTestCase {
	var $ItemsSearch = null;
	var $fixtures = array('app.items_search', 'app.item', 'app.search');

	function start() {
		parent::start();
		$this->ItemsSearch = new TestItemsSearch();
	}

	function testItemsSearchInstance() {
		$this->assertTrue(is_a($this->ItemsSearch, 'ItemsSearch'));
	}

	function testItemsSearchFind() {
		$results = $this->ItemsSearch->recursive = -1;
		$results = $this->ItemsSearch->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ItemsSearch' => array(
			'id'  => 1,
			'item_id'  => 1,
			'search_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>