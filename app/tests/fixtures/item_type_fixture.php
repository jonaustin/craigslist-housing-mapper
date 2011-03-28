<?php 
/* SVN FILE: $Id$ */
/* ItemType Fixture generated on: 2008-07-21 20:07:28 : 1216698148*/

class ItemTypeFixture extends CakeTestFixture {
	var $name = 'ItemType';
	var $table = 'item_types';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 75),
			'value' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 3),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'value'  => 'L'
			));
}
?>