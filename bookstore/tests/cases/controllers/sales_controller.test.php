<?php
/* Sales Test cases generated on: 2011-01-07 21:01:22 : 1294414222*/
App::import('Controller', 'Sales');

class TestSalesController extends SalesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SalesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.sale', 'app.book', 'app.category', 'app.author', 'app.book_publication', 'app.publication', 'app.country', 'app.user', 'app.role', 'app.customer');

	function startTest() {
		$this->Sales =& new TestSalesController();
		$this->Sales->constructClasses();
	}

	function endTest() {
		unset($this->Sales);
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