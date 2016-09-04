<?php
/* Authors Test cases generated on: 2011-01-07 21:01:21 : 1294414221*/
App::import('Controller', 'Authors');

class TestAuthorsController extends AuthorsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AuthorsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.author', 'app.book', 'app.category', 'app.book_publication', 'app.publication', 'app.country', 'app.sale', 'app.user', 'app.role', 'app.customer');

	function startTest() {
		$this->Authors =& new TestAuthorsController();
		$this->Authors->constructClasses();
	}

	function endTest() {
		unset($this->Authors);
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