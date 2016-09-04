<?php
class Cart extends AppModel {
	var $name = 'Cart';

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => array('User.id', 'User.firstname', 'User.lastname'),
			'order' => ''
		),
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'dependent' => true
		)
	);
	
	var $hasMany = array(
		'Sale' => array(
			'className' => 'Sale',
			'foreignKey' => 'cart_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function beforeSave() {
		if(!isset($this->data['Cart']['id'])) {
			$this->data['Cart']['date'] = date("Y-m-d H:i:s");
			$this->data['Cart']['amount'] = 0;
			for($i=0; $i < count($this->data['Sale']);$i++) {
				$this->data['Cart']['amount'] += $this->data['Sale'][$i]['unit_price'] * $this->data['Sale'][$i]['quantity'];
			}
			$this->data['Cart']['discountedamount'] = $this->data['Cart']['amount'] *  ($this->data['Cart']['discount']/100);
			$this->data['Cart']['amount'] = $this->data['Cart']['amount'] - $this->data['Cart']['discountedamount'];
			if(!$this->data['Cart']['discount']) {
				$this->data['Cart']['discount'] = 0;
			}				
		}
		return true;
	}

}
?>
