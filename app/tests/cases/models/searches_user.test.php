<?php 
/* SVN FILE: $Id$ */
/* SearchesUser Test cases generated on: 2008-07-21 20:07:23 : 1216698803*/
App::import('Model', 'SearchesUser');

class TestSearchesUser extends SearchesUser {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class SearchesUserTestCase extends CakeTestCase {
	var $SearchesUser = null;
	var $fixtures = array('app.searches_user', 'app.user', 'app.search');

	function start() {
		parent::start();
		$this->SearchesUser = new TestSearchesUser();
	}

	function testSearchesUserInstance() {
		$this->assertTrue(is_a($this->SearchesUser, 'SearchesUser'));
	}

	function testSearchesUserFind() {
		$results = $this->SearchesUser->recursive = -1;
		$results = $this->SearchesUser->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('SearchesUser' => array(
			'id'  => 1,
			'user_id'  => 1,
			'search_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>