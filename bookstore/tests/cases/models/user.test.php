<?php
/* User Test cases generated on: 2011-01-07 21:01:15 : 1294414215*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.role', 'app.sale', 'app.book', 'app.category', 'app.author', 'app.book_publication', 'app.publication', 'app.country', 'app.customer');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function endTest() {
		unset($this->User);
		ClassRegistry::flush();
	}

}
?>