<?php
class ItemsSearch extends AppModel {

	var $name = 'ItemsSearch';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Item' => array('className' => 'Item',
								'foreignKey' => 'item_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Search' => array('className' => 'Search',
								'foreignKey' => 'search_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>