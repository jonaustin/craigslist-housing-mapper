<?php
class SearchesUser extends AppModel {

	var $name = 'SearchesUser';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
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