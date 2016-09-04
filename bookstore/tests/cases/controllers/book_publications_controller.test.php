<?php
/* BookPublications Test cases generated on: 2011-01-07 21:01:21 : 1294414221*/
App::import('Controller', 'BookPublications');

class TestBookPublicationsController extends BookPublicationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BookPublicationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.book_publication', 'app.book', 'app.category', 'app.author', 'app.sale', 'app.user', 'app.role', 'app.customer', 'app.publication', 'app.country');

	function startTest() {
		$this->BookPublications =& new TestBookPublicationsController();
		$this->BookPublications->constructClasses();
	}

	function endTest() {
		unset($this->BookPublications);
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