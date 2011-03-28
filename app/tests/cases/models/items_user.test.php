<?php 
/* SVN FILE: $Id$ */
/* ItemsUser Test cases generated on: 2008-07-21 20:07:49 : 1216698769*/
App::import('Model', 'ItemsUser');

class TestItemsUser extends ItemsUser {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class ItemsUserTestCase extends CakeTestCase {
	var $ItemsUser = null;
	var $fixtures = array('app.items_user', 'app.item', 'app.user');

	function start() {
		parent::start();
		$this->ItemsUser = new TestItemsUser();
	}

	function testItemsUserInstance() {
		$this->assertTrue(is_a($this->ItemsUser, 'ItemsUser'));
	}

	function testItemsUserFind() {
		$results = $this->ItemsUser->recursive = -1;
		$results = $this->ItemsUser->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ItemsUser' => array(
			'id'  => 1,
			'item_id'  => 1,
			'user_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>