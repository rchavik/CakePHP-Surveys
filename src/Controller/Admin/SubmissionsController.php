<?php

namespace Surveys\Controller\Admin;

use Cake\Event\Event;
use Croogo\Core\Controller\Admin\AppController as CroogoController;

/**
 * Submissions Controller
 *
 * @property \Surveys\Model\Table\SubmissionsTable $Submissions
 */
class SubmissionsController extends CroogoController
{

    public function initialize()
    {
        parent::initialize();

        $this->Crud->config('actions.index', [
            'searchFields' => ['survey_id', 'user_id'],
        ]);

        $this->_setupPrg();
    }

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);

        $this->Crud->on('beforePaginate', function(Event $event) {
            if (!$this->request->query('sort')) {
                $event->subject()->query
                    ->order([
                        $this->Submissions->aliasField('id') => 'desc',
                    ]);
            }
            if ($this->request->query('export')) {
                $event->subject()->query
                    ->contain([
                        'SubmissionDetails' => [
                            'sort' => [
                                'sequence_id' => 'asc',
                            ],
                        ],
                    ]);
            }
        });

        $this->Crud->on('afterPaginate', function(Event $event) {
            if (!$this->request->query('export') || !$this->request->query('survey_id')) {
                return;
            }
            $this->viewBuilder()->className('CsvView.Csv');
            $this->response->download('export.csv');
            $submissions = $event->subject()->entities;
            $questions = $this->Submissions->Surveys->Questions->find()
                ->where(['survey_id' => $this->request->query('survey_id')])
                ->order(['weight' => 'asc']);
            $_serialize = null;
            $_delimiter = "\t";
            $this->set(compact('submissions', '_delimiter', 'questions'));
        });

        if ($surveyId = $this->request->query('survey_id')) {
            $this->set('survey', $this->Submissions->Surveys->get($surveyId));
        }

        return $this->Crud->execute();
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);
        $this->Crud->on('beforeFind', function(Event $event) {
            $event->subject()->query
                ->contain(['Users', 'SubmissionDetails', 'SubmissionDetails.Questions']);
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
