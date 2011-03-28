<?php
class ItemType extends AppModel {

	var $name = 'ItemType';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Item' => array('className' => 'Item',
								'foreignKey' => 'item_type_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);

}
?>