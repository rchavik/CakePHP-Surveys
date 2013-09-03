<?php
App::uses('SurveysAppController', 'Surveys.Controller');
/**
 * SubmissionDetails Controller
 *
 * @property SubmissionDetail $SubmissionDetail
 */
class SubmissionDetailsController extends SurveysAppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SubmissionDetail->recursive = 0;
		$this->set('submissionDetails', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SubmissionDetail->exists($id)) {
			throw new NotFoundException(__('Invalid submission detail'));
		}
		$options = array('conditions' => array('SubmissionDetail.' . $this->SubmissionDetail->primaryKey => $id));
		$this->set('submissionDetail', $this->SubmissionDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SubmissionDetail->create();
			if ($this->SubmissionDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The submission detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The submission detail could not be saved. Please, try again.'));
			}
		}
		$questions = $this->SubmissionDetail->Question->find('list');
		$submissions = $this->SubmissionDetail->Submission->find('list');
		$this->set(compact('questions', 'submissions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->SubmissionDetail->exists($id)) {
			throw new NotFoundException(__('Invalid submission detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SubmissionDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The submission detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The submission detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SubmissionDetail.' . $this->SubmissionDetail->primaryKey => $id));
			$this->request->data = $this->SubmissionDetail->find('first', $options);
		}
		$questions = $this->SubmissionDetail->Question->find('list');
		$submissions = $this->SubmissionDetail->Submission->find('list');
		$this->set(compact('questions', 'submissions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->SubmissionDetail->id = $id;
		if (!$this->SubmissionDetail->exists()) {
			throw new NotFoundException(__('Invalid submission detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SubmissionDetail->delete()) {
			$this->Session->setFlash(__('Submission detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Submission detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
