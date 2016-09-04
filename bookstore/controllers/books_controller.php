<?php
class BooksController extends AppController {

	var $name = 'Books';

	function index() {
		$this->Book->recursive = 0;
		$conditions = null;
		$ajax = false;
			if($this->RequestHandler->isAjax()) {
				if(!isset($this->params['data'])) {
					$this->params['data'] = '';
				}
				$bookText = $this->params['data'];
				$conditions = array("OR" => array("Book.name LIKE" => "%$bookText%", "Book.ISBN LIKE" => "%$bookText%"));
				$ajax = true;
			}
		$this->set('ajax', $ajax);
		$this->set('books', $this->paginate($conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid book', true));
			$this->redirect(array('action' => 'index'));
		}
		$bookSells = $this->Book->Sale->find('all', array(
													'fields' => array('count(Sale.book_id) as booksells'),
													'conditions' => array('Sale.book_id' => $id)
										));
		$this->set('book', $this->Book->read(null, $id));
		$this->set('bookSells', $bookSells['0']['0']['booksells']);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Book->create();
			if ($this->Book->save($this->data)) {
				$this->Session->setFlash(__('The book has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->Book->Category->find('list');
		$authors = $this->Book->Author->find('list');
		$this->set(compact('categories', 'authors'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid book', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Book->save($this->data)) {
				$this->Session->setFlash(__('The book has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Book->read(null, $id);
		}
		$categories = $this->Book->Category->find('list');
		$authors = $this->Book->Author->find('list');
		$this->set(compact('categories', 'authors'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for book', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Book->delete($id)) {
			$this->Session->setFlash(__('Book deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Book was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getBookList() {
		$this->autoRender = false;
		$bookText = $this->params['data'];

			$conditions = array("Book.name LIKE" => "%$bookText%" );
			debug($this->Book->find('all', array('conditions' => $conditions)));
	}
	
	function report($dateParam = null) {
		if($this->RequestHandler->isAjax()) {
			$date = $this->params['data'];
		}
		if(!$dateParam) {
			$dateParam = date('Y'). "-0-0";
		}

		$this->loadModel('Setting');
		$setg = $this->Setting->find('all');
		$criticalStockLimit = $setg['0']['Setting']['value'];
		
		$criticalBooks = $this->Book->find('all', array(
									'fields' => array('Book.id', 'Book.name', 'Book.stock'),
									'conditions' => array(
										'Book.stock BETWEEN ? and ?' => array(1, $criticalStockLimit)
									)
								)
						);
		$outOfStockBooks = $this->Book->find('all', array(
														'fields' => array('Book.id', 'Book.name'),
														'conditions' => array(
															'Book.stock' => 0
															)
													)
											);
		$totalBooks = $this->Book->find('count');
		$this->Book->recursive = -2;
		$authors = $this->Book->find('all', array(
													  'fields' => 'Book.author_id',
													  'group' => array(
													  	'Book.author_id'
														)	
													)
												);
		$this->Session->write('Authors', $authors);
		$orderSalesBooks = $this->Book->Sale->find('all', array(
														'fields' => array('Book.id', 'Book.name', 'COUNT(*) as counted'),
														'group' => array('Sale.book_id'),
														'order' => array('counted DESC'),
														'conditions' => array('Cart.date >=' => $dateParam)
														)
												);
		$customers = $this->Book->Sale->Cart->find('all', array(
															 'fields' => array('Customer.id', 'Customer.name', 'Customer.adress', 'count(*) as counted'),
															 'group' => array('Cart.customer_id'),
															 'order' => array('counted DESC'),
															 'conditions' => array('Cart.date >=' => $dateParam)
															)
													);
		
		$this->set(compact('criticalBooks', 'outOfStockBooks', 'totalBooks', 'orderSalesBooks', 'customers', 'authors'));
	}
}
?>