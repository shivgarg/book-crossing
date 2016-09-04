<?php
/* Publication Test cases generated on: 2011-01-07 21:01:15 : 1294414215*/
App::import('Model', 'Publication');

class PublicationTestCase extends CakeTestCase {
	var $fixtures = array('app.publication', 'app.country', 'app.book', 'app.category', 'app.author', 'app.book_publication', 'app.sale');

	function startTest() {
		$this->Publication =& ClassRegistry::init('Publication');
	}

	function endTest() {
		unset($this->Publication);
		ClassRegistry::flush();
	}

}
?>