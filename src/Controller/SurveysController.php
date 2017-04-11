<?php

namespace Surveys\Controller;

use Croogo\Core\Controller\AppController as CroogoController;

class SurveysController extends CroogoController
{

    public function view($id = null)
    {
        $survey = $this->Surveys->find('surveyQuestions', [
            'id' => $id,
        ])->firstOrFail();
        $this->set(compact('survey'));
    }

}
