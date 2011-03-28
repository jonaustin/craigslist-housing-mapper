<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2008-07-21 20:07:07 : 1216698907*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
			'username' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
			'password' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 250),
			'user_type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 20),
			'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 75),
			'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'user_type'  => 'Lorem ipsum dolor ',
			'email'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2008-07-21 20:55:07'
			));
}
?>