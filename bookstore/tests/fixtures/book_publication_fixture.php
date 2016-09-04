<?php
/* BookPublication Fixture generated on: 2011-01-07 21:01:14 : 1294414214 */
class BookPublicationFixture extends CakeTestFixture {
	var $name = 'BookPublication';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'book_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'publication_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'book_id' => 1,
			'publication_id' => 1
		),
	);
}
?>