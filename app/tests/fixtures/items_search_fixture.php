<?php 
/* SVN FILE: $Id$ */
/* ItemsSearch Fixture generated on: 2008-07-21 20:07:36 : 1216698756*/

class ItemsSearchFixture extends CakeTestFixture {
	var $name = 'ItemsSearch';
	var $table = 'items_searches';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 14, 'key' => 'primary'),
			'item_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12),
			'search_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'item_id'  => 1,
			'search_id'  => 1
			));
}
?>