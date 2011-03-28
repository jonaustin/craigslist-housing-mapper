<?php 
/* SVN FILE: $Id$ */
/* ItemsUser Fixture generated on: 2008-07-21 20:07:48 : 1216698768*/

class ItemsUserFixture extends CakeTestFixture {
	var $name = 'ItemsUser';
	var $table = 'items_users';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 14, 'key' => 'primary'),
			'item_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12),
			'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'item_id'  => 1,
			'user_id'  => 1
			));
}
?>