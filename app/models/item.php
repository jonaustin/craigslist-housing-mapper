<?php
class Item extends AppModel {

	var $name = 'Item';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'ItemType' => array('className' => 'ItemType',
								'foreignKey' => 'item_type_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasAndBelongsToMany = array(
			'Search' => array('className' => 'Search',
						'joinTable' => 'items_searches',
						'foreignKey' => 'item_id',
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
			),
			'User' => array('className' => 'User',
						'joinTable' => 'items_users',
						'foreignKey' => 'item_id',
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

    var $actsAs = array('Geocoded' => array( 
        'key' => 'ABQIAAAAUpTZIT6rPHKgU7tKFKzKpRRHftAafOsikQUObIE-Rd6KElHeCxSFTpun6qzmGA2Wcoi9totA1_JugA' 
    )); 

}
?>
