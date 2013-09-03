<?php
App::uses('SurveysAppController', 'Surveys.Controller');
/**
 * Submissions Controller
 *
 * @property Submission $Submission
 * @property PaginatorComponent $Paginator
 */
class SubmissionsController extends SurveysAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Submission->recursive = 0;
		$this->set('submissions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Submission->exists($id)) {
			throw new NotFoundException(__('Invalid submission'));
		}
		$options = array('conditions' => array('Submission.' . $this->Submission->primaryKey => $id));
		$this->set('submission', $this->Submission->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Submission->create();
			if ($this->Submission->save($this->request->data)) {
				$this->Session->setFlash(__('The submission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The submission could not be saved. Please, try again.'));
			}
		}
		$users = $this->Submission->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Submission->exists($id)) {
			throw new NotFoundException(__('Invalid submission'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Submission->save($this->request->data)) {
				$this->Session->setFlash(__('The submission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The submission could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Submission.' . $this->Submission->primaryKey => $id));
			$this->request->data = $this->Submission->find('first', $options);
		}
		$users = $this->Submission->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Submission->id = $id;
		if (!$this->Submission->exists()) {
			throw new NotFoundException(__('Invalid submission'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Submission->delete()) {
			$this->Session->setFlash(__('The submission has been deleted.'));
		} else {
			$this->Session->setFlash(__('The submission could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
