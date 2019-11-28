<?php

namespace Surveys\Controller;

use Croogo\Core\Controller\AppController as CroogoController;
use Cake\Event\Event;
use Cake\Http\Exception\NotFoundException;
use Cake\Utility\Text;

class SubmissionsController extends CroogoController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Crud.Crud');

        $this->Crud->mapAction('add', [
            'className' => 'Crud.Add',
            'messages' => [
                'success' => [
                    'text' => __d('croogo', '{name} received successfully'),
                    'params' => [
                        'type' => 'success',
                        'class' => 'alert alert-primary alert-dismissible',
                    ],
                ],
                'error' => [
                    'text' => __d('croogo', 'Failed processing {name}'),
                ],
            ],
        ]);
    }

    public function add()
    {
        $this->Crud->action()->saveOptions([
            'associated' => ['SubmissionDetails'],
        ]);

        $this->Crud->on('beforeRedirect', function(Event $event) {
            $nonce = Text::uuid();
            $this->getRequest()->session()->write('Surveys.nonceDone', $nonce);
            return $this->redirect(['action' => 'done', 'nonce' => $nonce]);
        });

        return $this->Crud->execute();
    }

    public function done()
    {
        $session = $this->getRequest()->session();
        $nonce = $this->getRequest()->getQuery('nonce');

        $saved = $session->read('Surveys.nonceDone');
        if (!$saved || $nonce !== $saved) {
            throw new NotFoundException();
        }
        $session->delete('Surveys.nonceDone');
    }

}
