<?php 
/* SVN FILE: $Id$ */
/* SearchesUser Fixture generated on: 2008-07-21 20:07:23 : 1216698803*/

class SearchesUserFixture extends CakeTestFixture {
	var $name = 'SearchesUser';
	var $table = 'searches_users';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 14, 'key' => 'primary'),
			'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12),
			'search_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'user_id'  => 1,
			'search_id'  => 1
			));
}
?>