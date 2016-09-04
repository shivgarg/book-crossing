<?php
/* Book Test cases generated on: 2011-01-07 21:01:14 : 1294414214*/
App::import('Model', 'Book');

class BookTestCase extends CakeTestCase {
	var $fixtures = array('app.book', 'app.category', 'app.author', 'app.book_publication', 'app.publication', 'app.sale');

	function startTest() {
		$this->Book =& ClassRegistry::init('Book');
	}

	function endTest() {
		unset($this->Book);
		ClassRegistry::flush();
	}

}
?>