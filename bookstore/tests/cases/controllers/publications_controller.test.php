<?php
/* Publications Test cases generated on: 2011-01-07 21:01:22 : 1294414222*/
App::import('Controller', 'Publications');

class TestPublicationsController extends PublicationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PublicationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.publication', 'app.country', 'app.book', 'app.category', 'app.author', 'app.book_publication', 'app.sale', 'app.user', 'app.role', 'app.customer');

	function startTest() {
		$this->Publications =& new TestPublicationsController();
		$this->Publications->constructClasses();
	}

	function endTest() {
		unset($this->Publications);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>