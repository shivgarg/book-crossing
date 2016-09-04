<?php
/* BookPublication Test cases generated on: 2011-01-07 21:01:14 : 1294414214*/
App::import('Model', 'BookPublication');

class BookPublicationTestCase extends CakeTestCase {
	var $fixtures = array('app.book_publication', 'app.book', 'app.publication');

	function startTest() {
		$this->BookPublication =& ClassRegistry::init('BookPublication');
	}

	function endTest() {
		unset($this->BookPublication);
		ClassRegistry::flush();
	}

}
?>