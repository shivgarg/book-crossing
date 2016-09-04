<?php
/* Cart Test cases generated on: 2011-01-10 22:01:22 : 1294679662*/
App::import('Model', 'Cart');

class CartTestCase extends CakeTestCase {
	var $fixtures = array('app.cart', 'app.user', 'app.role', 'app.sale', 'app.book', 'app.category', 'app.author', 'app.book_publication', 'app.publication', 'app.country', 'app.customer');

	function startTest() {
		$this->Cart =& ClassRegistry::init('Cart');
	}

	function endTest() {
		unset($this->Cart);
		ClassRegistry::flush();
	}

}
?>