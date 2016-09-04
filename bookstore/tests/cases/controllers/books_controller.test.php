<?php
/* Books Test cases generated on: 2011-01-07 21:01:21 : 1294414221*/
App::import('Controller', 'Books');

class TestBooksController extends BooksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BooksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.book', 'app.category', 'app.author', 'app.book_publication', 'app.publication', 'app.country', 'app.sale', 'app.user', 'app.role', 'app.customer');

	function startTest() {
		$this->Books =& new TestBooksController();
		$this->Books->constructClasses();
	}

	function endTest() {
		unset($this->Books);
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