<?php
App::uses('SurveysAppController', 'Surveys.Controller');
/**
 * QuestionOptions Controller
 *
 * @property QuestionOption $QuestionOption
 */
class QuestionOptionsController extends SurveysAppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->QuestionOption->recursive = 0;
		$this->set('questionOptions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->QuestionOption->exists($id)) {
			throw new NotFoundException(__('Invalid question option'));
		}
		$options = array('conditions' => array('QuestionOption.' . $this->QuestionOption->primaryKey => $id));
		$this->set('questionOption', $this->QuestionOption->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->QuestionOption->create();
			if ($this->QuestionOption->save($this->request->data)) {
				$id = $this->request->data['QuestionOption']['question_id'];
				$this->Session->setFlash(__('The question option has been saved'));
				$this->redirect(array('controller' => 'questions', 'action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The question option could not be saved. Please, try again.'));
			}
		}
		$questions = $this->QuestionOption->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->QuestionOption->exists($id)) {
			throw new NotFoundException(__('Invalid question option'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionOption->save($this->request->data)) {
				$id = $this->request->data['QuestionOption']['question_id'];
				$this->Session->setFlash(__('The question option has been saved'));
				$this->redirect(array('controller' => 'questions', 'action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The question option could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionOption.' . $this->QuestionOption->primaryKey => $id));
			$this->request->data = $this->QuestionOption->find('first', $options);
		}
		$questions = $this->QuestionOption->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->QuestionOption->id = $id;
		if (!$this->QuestionOption->exists()) {
			throw new NotFoundException(__('Invalid question option'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuestionOption->delete()) {
			$this->Session->setFlash(__('Question option deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question option was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
