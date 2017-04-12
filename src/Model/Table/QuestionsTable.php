<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;

class QuestionsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->addBehavior('ADmad/Sequence.Sequence', [
            'order' => 'weight',
            'scope' => ['survey_id'],
        ]);
        $this->hasMany('Surveys.QuestionOptions');
        $this->belongsTo('Surveys.Surveys');

        $this->displayField('questions');

        $this->searchManager()
            ->value('survey_id');
    }

}
