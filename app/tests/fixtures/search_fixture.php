<?php 
/* SVN FILE: $Id$ */
/* Search Fixture generated on: 2008-07-21 20:07:46 : 1216698886*/

class SearchFixture extends CakeTestFixture {
	var $name = 'Search';
	var $table = 'searches';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'key' => 'primary'),
			'query' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 30),
			'minAsk' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 6),
			'maxAsk' => array('type'=>'string', 'null' => false, 'default' => '0', 'length' => 6),
			'bedrooms' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 1),
			'hasPic' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'addTwo' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'addThree' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'srchType' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'catAbbreviation' => array('type'=>'string', 'null' => false, 'default' => 'apa', 'length' => 3),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
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
}
?>