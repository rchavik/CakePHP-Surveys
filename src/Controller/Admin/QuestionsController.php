<?php

namespace Surveys\Controller\Admin;

use Cake\Event\Event;
use Croogo\Core\Controller\Admin\AppController as CroogoController;

/**
 * Questions Controller
 *
 * @property \Surveys\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends CroogoController
{

    /**
     * Initialize method
     */
    public function initialize()
    {
        parent::initialize();
        $this->Crud->config('actions.moveUp', [
            'className' => 'Croogo/Core.Admin/MoveUp',
        ]);
        $this->Crud->config('actions.moveDown', [
            'className' => 'Croogo/Core.Admin/MoveDown',
        ]);
    }

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);

        $this->Crud->on('beforePaginate', function(Event $event) {
            $surveyId = $this->request->query('survey_id');
            if ($surveyId) {
                $survey = $this->Questions->Surveys->get($surveyId);
                $this->set(compact('survey'));
            }

            if (!$this->request->query('sort')) {
                $event->subject()->query
                    ->order([
                        'survey_id' => 'desc',
                        'weight' => 'asc',
                    ]);
            }
        });

        return $this->Crud->execute();
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $this->Crud->on('beforeFind', function(Event $event) {
            $event->subject()->query
                ->contain([
                    'Surveys',
                    'QuestionOptions',
                ]);
        });

        $this->Crud->on('afterFind', function(Event $event) {
            $surveyId = $event->subject()->entity->get('survey_id');
            if ($surveyId) {
                $survey = $this->Questions->Surveys->get($surveyId);
                $this->set(compact('survey'));
            }
        });
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
        $this->Crud->on('afterFind', function(Event $event) {
            $surveyId = $event->subject()->entity->survey_id;
            if ($surveyId) {
                $survey = $this->Questions->Surveys->get($surveyId);
                $this->set(compact('survey'));
            }
        });
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
