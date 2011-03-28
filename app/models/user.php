<?php
class User extends AppModel {

	var $name = 'User';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Item' => array('className' => 'Item',
						'joinTable' => 'items_users',
						'foreignKey' => 'user_id',
						'associationForeignKey' => 'item_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			),
    );

    var $BelongsTo = array(
			'Search' => array('className' => 'Search',
						'joinTable' => 'searches_users',
						'foreignKey' => 'user_id',
						'associationForeignKey' => 'search_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			)
	);

}
?>
