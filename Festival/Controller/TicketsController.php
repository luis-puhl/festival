<?php
App::uses('AppController', 'Controller');
/**
 * Tickets Controller
 *
 * @property Ticket $Ticket
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TicketsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $uses = array('Ticket', 'User', 'Client');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ticket->recursive = 0;
		$this->set('tickets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
		$this->set('ticket', $this->Ticket->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		return $this->redirect(array('action' => 'buy'));
	}
	
	/**
	 * buy method
	 *
	 * @return void
	 */
	public function buy() {
		if ($this->request->is('post')) {
			$this->Ticket->create();
			
			$data = $this->request->data;
			
			$cli = $this->Client->findByUserId($this->Auth->user('id'));
			$data['Ticket']['client_id'] = $cli['Client']['id'];
			
			if ($this->Ticket->save($data)) {
				$this->Session->setFlash(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket could not be saved. Please, try again.'));
			}
		}
		//~ $clients = $this->Ticket->Client->find('list');
		
		$events = $this->Ticket->Event->find('upcomingList');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Session->setFlash(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
			$this->request->data = $this->Ticket->find('first', $options);
		}
		$clients = $this->Ticket->Client->find('list');
		$events = $this->Ticket->Event->find('list');
		$this->set(compact('clients', 'events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ticket->id = $id;
		if (!$this->Ticket->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ticket->delete()) {
			$this->Session->setFlash(__('The ticket has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ticket could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
