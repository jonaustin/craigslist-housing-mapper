<?php 
/* SVN FILE: $Id$ */
/* Search Test cases generated on: 2008-07-21 20:07:46 : 1216698886*/
App::import('Model', 'Search');

class TestSearch extends Search {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class SearchTestCase extends CakeTestCase {
	var $Search = null;
	var $fixtures = array('app.search');

	function start() {
		parent::start();
		$this->Search = new TestSearch();
	}

	function testSearchInstance() {
		$this->assertTrue(is_a($this->Search, 'Search'));
	}

	function testSearchFind() {
		$results = $this->Search->recursive = -1;
		$results = $this->Search->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Search' => array(
			'id'  => 1,
			'query'  => 'Lorem ipsum dolor sit amet',
			'minAsk'  => 1,
			'maxAsk'  => 'Lore',
			'bedrooms'  => 1,
			'hasPic'  => 1,
			'addTwo'  => 1,
			'addThree'  => 1,
			'srchType'  => 1,
			'catAbbreviation'  => 'L'
			));
		$this->assertEqual($results, $expected);
	}
}
?>