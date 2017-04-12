<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;

class QuestionOptionsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->addBehavior('ADmad/Sequence.Sequence', [
            'order' => 'weight',
            'scope' => ['question_id'],
        ]);
        $this->addBehavior('CounterCache', [
            'Questions' => ['total_sequence'],
        ]);
        $this->belongsTo('Surveys.Questions');

        $this->searchManager()
            ->value('question_id');
    }
}
