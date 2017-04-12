<?php

namespace Surveys\Controller\Admin;

use Cake\Event\Event;
use Croogo\Core\Controller\Admin\AppController as CroogoController;

/**
 * Surveys Controller
 *
 * @property \Surveys\Model\Table\SurveysTable $Surveys
 */
class SurveysController extends CroogoController
{

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);
        return $this->Crud->execute();
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $this->Crud->on('beforeFind', function(Event $event) use ($id) {
            $event->subject()->query
                ->find('surveyQuestions', [
                    'id' => $id,
                ]);
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
