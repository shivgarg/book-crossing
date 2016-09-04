<?php
class BookPublicationsController extends AppController {

	var $name = 'BookPublications';

	function index() {
		$this->BookPublication->recursive = 0;
		$this->set('bookPublications', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid book publication', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('bookPublication', $this->BookPublication->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->BookPublication->create();
			if ($this->BookPublication->save($this->data)) {
				$this->Session->setFlash(__('The book publication has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book publication could not be saved. Please, try again.', true));
			}
		}
		$books = $this->BookPublication->Book->find('list');
		$publications = $this->BookPublication->Publication->find('list');
		$this->set(compact('books', 'publications'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid book publication', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BookPublication->save($this->data)) {
				$this->Session->setFlash(__('The book publication has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book publication could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BookPublication->read(null, $id);
		}
		$books = $this->BookPublication->Book->find('list');
		$publications = $this->BookPublication->Publication->find('list');
		$this->set(compact('books', 'publications'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for book publication', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BookPublication->delete($id)) {
			$this->Session->setFlash(__('Book publication deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Book publication was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>