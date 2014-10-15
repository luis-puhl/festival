<?php
App::uses('AppController', 'Controller');
/**
 * Bands Controller
 *
 * @property Band $Band
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BandsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Band->recursive = 0;
		$this->set('bands', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Band->exists($id)) {
			throw new NotFoundException(__('Invalid band'));
		}
		$options = array('conditions' => array('Band.' . $this->Band->primaryKey => $id));
		$this->set('band', $this->Band->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Band->create();
			if ($this->Band->save($this->request->data)) {
				$this->Session->setFlash(__('The band has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The band could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Band->exists($id)) {
			throw new NotFoundException(__('Invalid band'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Band->save($this->request->data)) {
				$this->Session->setFlash(__('The band has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The band could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Band.' . $this->Band->primaryKey => $id));
			$this->request->data = $this->Band->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Band->id = $id;
		if (!$this->Band->exists()) {
			throw new NotFoundException(__('Invalid band'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Band->delete()) {
			$this->Session->setFlash(__('The band has been deleted.'));
		} else {
			$this->Session->setFlash(__('The band could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
