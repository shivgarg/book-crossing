<?php
class CartsController extends AppController {

	var $name = 'Carts';

	function index() {
		$this->Cart->recursive = 2;
		$this->set('carts', $this->paginate());
	}

	function view($id = null, $print = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid cart', true));
			$this->redirect(array('action' => 'index'));
		}
		if($print) {
			$this->layout = 'ajax';
			$this->set('print', true);
		}
		$this->Cart->recursive = 2;
		$this->loadModel('Author');
		$this->Author->recursive = -1;
		$allAuthors = $this->Author->find('all', array('fields' => array('Author.id', 'Author.firstname', 'Author.lastname')));
		$authors = '';
			foreach($allAuthors as $author) {		
				$authors[$author['Author']['id']] = $author['Author']['firstname']. " ". $author['Author']['lastname']; 
			}
		$this->set('cart', $this->Cart->read(null, $id));
		$this->set(compact('authors'));
	}

	function add() {
		$this->autoRender = false;
		$this->data['Cart']['user_id'] = $this->Session->read('Auth.User.id');
		$CustomerExists = $this->Cart->Customer->find('first', array(
											'fields' => array('id'),
											'conditions' => array(
												'Customer.name' => $this->data['Customer']['name'],
												'Customer.adress' => $this->data['Customer']['adress']		
											 )	
										)
									);
				if($CustomerExists) {
					$this->data['Cart']['customer_id'] = $CustomerExists['Customer']['id'];
					unset($this->data['Customer']);					
				}			
			if($this->Cart->saveAll($this->data)) {
				$prevData = $this->data;
				$this->data = null;
				$this->loadModel('Book');
				foreach($prevData['Sale'] as $sale) {
					$this->Book->create();
					$this->Book->data = $this->Book->read(null, $sale['book_id']);
					$this->Book->data['Book']['stock'] = $this->Book->data['Book']['stock'] - $sale['quantity'];
					$this->Book->save($this->Book->data);
				}				
				$this->Session->setFlash(__("The Invoice has been created.", true));
				$this->Session->delete('Cart');
				$this->redirect(array('action' => 'view', $this->Cart->getLastInsertID()));	
			} else {
				$this->Session->setFlash(__('The invoice could not be created.', true));
				$this->redirect(array('controller' => 'sales', 'action' => 'checkout'));
			}
	}

	function intelli_report() {
		$intelli_reports = '';
		$this->Cart->recursive = -2;

		$yrdiscounts = $this->Cart->find('all', array(
																'fields' => array("SUM(Cart.discountedamount)"),
																'conditions' => array('Cart.date >=' => date("Y"). "-0-0")
															)
													);
			$tydiscounts = $this->Cart->find('all', array(
																'fields' => array("SUM(Cart.discountedamount)"),
																'conditions' => array('Cart.date >=' => date("Y-m-d"))
															)
													);
			$yramounts = $this->Cart->find('all', array(
																'fields' => array("SUM(Cart.amount)"),
																'conditions' => array('Cart.date >=' => date("Y"). "-0-0")
															)
													);
			$tyamounts = $this->Cart->find('all', array(
																'fields' => array("SUM(Cart.amount)"),
																'conditions' => array('Cart.date >=' => date("Y-m-d"))
															)
													);											
			$yrsales = $this->Cart->find('count', array(
																'conditions' => array('Cart.date >=' => date("Y"). "-0-0")
															)
													);
			$tysales = $this->Cart->find('count', array(
																'conditions' => array('Cart.date >=' => date("Y-m-d"))
															)
													);
		$this->set(compact('yrdiscounts', 'tydiscounts', 'yramounts', 'tyamounts', 'yrsales', 'tysales'));
	}
	
	function search() {
		$this->Cart->User->recursive = -2;
		$users = '';
		$UserList = $this->Cart->User->find('all', array('fields' => array('User.id', 'User.firstname', 'User.lastname')));
			foreach($UserList as $user) {
				$users[$user['User']['id']] = $user['User']['firstname']. " ". $user['User']['lastname'];
			}
		$this->set(compact('users'));
	}
	
	function finder() {
		//debug($this->params);
		$this->Cart->recursive = 2;
		if($this->params['data'] !== 'idSearch') {
			$rv_params = (array)json_decode($this->params['data']);
			$params = '';
		
		
				foreach($rv_params as $index => $param) {
					$params[$index] = ($param) ? $param : '%';
				}
			if($params['Date'] !== '%') {
				$something = explode('/', $params['Date']);
				$params['Date'] = $something['2'].  "-". $something['0']."-". $something['1'];
			}
			//$this->Cart->User->unbindModel(array('Cart'));
			$results = $this->Cart->find('all', array(
										'conditions' => array(
											'Customer.name LIKE' => "%". $params['CustomerName']. "%",
											'Cart.date >= ' => $params['Date']. "%",
											'Cart.user_id LIKE' => $params['Salesman'],
											'Cart.amount LIKE' => $params['Amount'],
											'Cart.discountedamount LIKE' => $params['Discount']
										 ),
										 'order' => array(
										 	'Cart.date DESC'
										 )
									)
							);
		} else {
			$id = $this->params['form']['CustomerId'];
			$results = $this->Cart->find('all', array(
										'conditions' => array(
											'Customer.id' => $id,
										 ),
										 'order' => array(
										 	'Cart.date DESC'
										 )
									)
							);
		
		}
			$this->set(compact('results'));
	}
	
	function report() {
		$date = "2011-0-0";
		$this->autoRender = false;
		$sold_books = $this->Cart->Sale->find('all', array(
																'fields' => array('distinct(Sale.book_id)'),
																'conditions' => array(
																	'Cart.date >' => $date
																)
															)
														);
	
	}
	
	function monthlyreport($date = null) {
	$dateInitial = date('Y-m'). "-0";
	$dateFinal = date('Y-m-d');
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
			if($this->params['data'] !== '&'){
				$dateIn_Fin = explode('&', $this->params['data']);
				$dateInitial = ($dateIn_Fin['0']) ? $dateIn_Fin['0'] : date('Y-m'). "-0";
				$dateFinal = ($dateIn_Fin['1']) ? $dateIn_Fin['1'] : date('Y-m-d');	
			}			
		}
		$reports = '';
		$cartIds = '';
		$reports['date']['initial'] = $dateInitial;
		$reports['date']['final'] = $dateFinal; 
		$reports['carts'] = $this->Cart->find('all', array('conditions' => array('Cart.date BETWEEN ? AND ?' => array($dateInitial, $dateFinal))));
			foreach($reports['carts'] as $cart) {
				$cartIds[] = $cart['Cart']['id'];
			}
		$this->Cart->Sale->recursive = 2;
		$reports['sales'] = $this->Cart->Sale->find('all', array('conditions' => array('Sale.cart_id' => $cartIds)));
		$this->Cart->recursive = -2;
		$reports['cartsondates'] = $this->Cart->find('all', array(
																'fields' => array('date(Cart.date) as date', 'count(*) as sales'),
																'conditions' => array('Cart.date BETWEEN ? AND ?' => array($dateInitial, $dateFinal)),
																'group' => array('date(Cart.date)'),
																'order' => 'date(Cart.date) ASC'
															)
													);										
		$this->set(compact('reports'));
	}
}
?>