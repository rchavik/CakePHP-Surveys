<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;

class SurveysTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->hasMany('Surveys.Questions');
    }

    public function findSurveyQuestions(Query $query, array $options)
    {
        return $query
            ->select(['id', 'title'])
            ->where([
                $this->aliasField('id') => $options['id'],
            ])
            ->contain([
                'Questions' => [
                    'fields' => [
                        'id', 'survey_id', 'type', 'questions', 'weight', 'required',
                    ],
                ],
                'Questions.QuestionOptions' => [
                    'fields' => [
                        'id', 'question_id', 'options', 'weight', 'point',
                    ],
                ],
            ]);

    }

}
