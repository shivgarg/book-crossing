<?php
/* Author Fixture generated on: 2011-01-07 21:01:14 : 1294414214 */
class AuthorFixture extends CakeTestFixture {
	var $name = 'Author';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'firstname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'lastname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'firstname' => 'Lorem ipsum dolor sit amet',
			'lastname' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>