<?php
/* Carts Test cases generated on: 2011-01-10 22:01:40 : 1294679680*/
App::import('Controller', 'Carts');

class TestCartsController extends CartsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CartsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.cart', 'app.user', 'app.role', 'app.sale', 'app.book', 'app.category', 'app.author', 'app.book_publication', 'app.publication', 'app.country', 'app.customer');

	function startTest() {
		$this->Carts =& new TestCartsController();
		$this->Carts->constructClasses();
	}

	function endTest() {
		unset($this->Carts);
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