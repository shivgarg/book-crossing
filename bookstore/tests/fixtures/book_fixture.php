<?php
/* Book Fixture generated on: 2011-01-07 21:01:14 : 1294414214 */
class BookFixture extends CakeTestFixture {
	var $name = 'Book';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'published_year' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'edition' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'ISBN' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'price' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'stock' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'author_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'published_year' => '2011-01-07',
			'edition' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'ISBN' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'stock' => 1,
			'category_id' => 1,
			'author_id' => 1
		),
	);
}
?>