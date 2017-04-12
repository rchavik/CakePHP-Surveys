<?php

namespace Surveys\Controller\Admin;

use Cake\Event\Event;
use Croogo\Core\Controller\Admin\AppController as CroogoController;

/**
 * QuestionOptions Controller
 *
 * @property \Surveys\Model\Table\QuestionOptionsTable $QuestionOptions
 */
class QuestionOptionsController extends CroogoController
{

    /**
     * implementedEvents method
     */
    public function implementedEvents()
    {
        return parent::implementedEvents() + [
            'Crud.beforeRedirect' => 'beforeCrudRedirect',
        ];
    }

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);

        $this->Crud->on('afterPaginate', function(Event $event) {
            $questionId = $this->request->query('question_id');
            if ($questionId) {
                $question = $this->QuestionOptions->Questions->get($questionId);
                $this->set(compact('question'));
            }

            if (isset($question->survey_id)) {
                $survey = $this->QuestionOptions->Questions->Surveys->get($question->survey_id);
                $this->set(compact('survey'));
            }
        });
        return $this->Crud->execute();
    }

    public function beforeCrudRedirect(Event $event)
    {
        $entity = $event->subject()->entity;
        if ($entity->has('question_id')) {
            $event->subject()->url['question_id'] = $entity->get('question_id');
        }
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        return $this->Crud->execute();
    }

    /**
     * Add method
     */
    public function add()
    {
        return $this->Crud->execute();
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        return $this->Crud->execute();
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        return $this->Crud->execute();
    }

}
