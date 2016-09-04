<?php
class SalesController extends AppController {

	var $name = 'Sales';

	function index() {
		$this->Sale->recursive = 0;
		$this->set('sales', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid sale', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('sale', $this->Sale->read(null, $id));
	}

	function order() {
		if (!empty($this->data)) {
			$this->Sale->create();
			$this->data['Sale']['user_id'] = $this->Session->read('Auth.User.id');
			$this->data['Sale']['date'] = date('Ymd H:i:s');
			if ($this->Sale->save($this->data)) {
				$this->Session->setFlash(__('The sale has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
			}
		}
		$books = $this->Sale->Book->find('list');
		$this->set(compact('books'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid sale', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Sale->save($this->data)) {
				$this->Session->setFlash(__('The sale has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Sale->read(null, $id);
		}
		$books = $this->Sale->Book->find('list');
		$this->set(compact('books'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for sale', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Sale->delete($id)) {
			$this->Session->setFlash(__('Sale deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Sale was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function addToCart() {
		$this->autoRender = false;
		if(!$this->params['data']) {
			return false;
		}
		$SessionCount = 0;
		if($this->Session->check('CartItemCount')) {
			$SessionCount = (int)$this->Session->read('CartItemCount');
		}

		$this->Session->write('CartItemCount', ++$SessionCount);
		$this->Session->write('Cart.ItemId.'. $SessionCount,  $this->params['data']);
		return true;	
	}
	
	function checkout() {
		if(!$this->Session->check('Cart.ItemId')) {
			$this->Session->setFlash(__('No items added to the cart.', true));
			$this->redirect(array('action' => 'order'));
		}
		Configure::load('app_config');
		$taxes = Configure::read('Sales.tax');
		$books = $this->Sale->Book->find('all', array(
										'conditions' => array(
															'Book.id' => $this->Session->read('Cart.ItemId')
														)
											)
							);
		$this->set(compact('books', 'taxes'));
	}
	
	
}
?>
