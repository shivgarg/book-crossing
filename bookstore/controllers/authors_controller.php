<?php
class AuthorsController extends AppController {

	var $name = 'Authors';

	function index($onlyStocked = null) {
		$conditions = array('1' => '1');
			if($onlyStocked) {
				$books = $this->Session->read('Authors');
				$AuthorId = '';
					foreach($books as $book) {
						$AuthorId[] = $book['Book']['author_id'];
					}
					$conditions = array('Author.id' => $AuthorId);
			}
		$this->Author->recursive = 0;
		$this->set('authors', $this->paginate($conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid author', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('author', $this->Author->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Author->create();
			if ($this->Author->save($this->data)) {
				$this->Session->setFlash(__('The author has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The author could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid author', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Author->save($this->data)) {
				$this->Session->setFlash(__('The author has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The author could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Author->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for author', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Author->delete($id)) {
			$this->Session->setFlash(__('Author deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Author was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>