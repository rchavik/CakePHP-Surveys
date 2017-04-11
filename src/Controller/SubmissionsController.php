<?php

namespace Surveys\Controller;

use App\Controller\AppController as CroogoController;
use Cake\Event\Event;

class SubmissionsController extends CroogoController
{

    use \Cake\Log\LogTrait;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Crud.Crud');

        $this->Crud->mapAction('add', 'Crud.Add');
    }

    public function add()
    {
        $this->Crud->action()->saveOptions([
            'associated' => ['SubmissionDetails'],
        ]);

        $this->Crud->on('beforeRedirect', function(Event $event) {
            return $this->redirect(['action' => 'done']);
        });

        return $this->Crud->execute();
    }

    public function done()
    {
    }

}
