<?php
/* Cart Fixture generated on: 2011-01-10 22:01:22 : 1294679662 */
class CartFixture extends CakeTestFixture {
	var $name = 'Cart';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'date' => '2011-01-10 22:59:22',
			'user_id' => 1
		),
	);
}
?>