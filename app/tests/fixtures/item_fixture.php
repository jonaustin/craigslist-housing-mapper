<?php 
/* SVN FILE: $Id$ */
/* Item Fixture generated on: 2008-07-21 20:07:00 : 1216698720*/

class ItemFixture extends CakeTestFixture {
	var $name = 'Item';
	var $table = 'items';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'key' => 'primary'),
			'item_type_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12),
			'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 250),
			'name_loc' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 75),
			'price' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 6),
			'url' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 250),
			'date_posted' => array('type'=>'date', 'null' => false, 'default' => NULL),
			'created' => array('type'=>'date', 'null' => false, 'default' => NULL),
			'hasCats' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'hasDog' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'hasPic' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'bedrooms' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'county' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 3),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
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
}
?>