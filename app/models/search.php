<?php
class Search extends AppModel {

	var $name = 'Search';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Item' => array('className' => 'Item',
						'joinTable' => 'items_searches',
						'foreignKey' => 'search_id',
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
			'User' => array('className' => 'User',
						'joinTable' => 'searches_users',
						'foreignKey' => 'search_id',
						'associationForeignKey' => 'user_id',
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
