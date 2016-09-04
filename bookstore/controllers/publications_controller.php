<?php
class PublicationsController extends AppController {

	var $name = 'Publications';

	function index() {
		$this->Publication->recursive = 0;
		$this->set('publications', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid publication', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('publication', $this->Publication->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Publication->create();
			if ($this->Publication->save($this->data)) {
				$this->Session->setFlash(__('The publication has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.', true));
			}
		}
		$countries = $this->Publication->Country->find('list');
		$books = $this->Publication->Book->find('list');
		$this->set(compact('countries', 'books'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid publication', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Publication->save($this->data)) {
				$this->Session->setFlash(__('The publication has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Publication->read(null, $id);
		}
		$countries = $this->Publication->Country->find('list');
		$books = $this->Publication->Book->find('list');
		$this->set(compact('countries', 'books'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for publication', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Publication->delete($id)) {
			$this->Session->setFlash(__('Publication deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Publication was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>