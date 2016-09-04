<?php
/* Author Test cases generated on: 2011-01-07 21:01:14 : 1294414214*/
App::import('Model', 'Author');

class AuthorTestCase extends CakeTestCase {
	var $fixtures = array('app.author', 'app.book');

	function startTest() {
		$this->Author =& ClassRegistry::init('Author');
	}

	function endTest() {
		unset($this->Author);
		ClassRegistry::flush();
	}

}
?>