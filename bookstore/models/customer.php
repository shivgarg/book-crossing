<?php
class Customer extends AppModel {
	var $name = 'Customer';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	var $hasMany = array(
		'Cart' => array(
		   'className' => 'Cart',
		   'foreignKey' => 'customer_id',
		   'fields' => array('Cart.id', 'Cart.discountedamount', 'Cart.amount', 'Cart.date')
		)
	);

}
?>
