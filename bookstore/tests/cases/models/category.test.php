<?php
/* Category Test cases generated on: 2011-01-07 21:01:14 : 1294414214*/
App::import('Model', 'Category');

class CategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.category', 'app.book', 'app.author', 'app.book_publication', 'app.publication', 'app.sale');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function endTest() {
		unset($this->Category);
		ClassRegistry::flush();
	}

}
?>