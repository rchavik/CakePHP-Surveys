<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;

class QuestionOptionsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->belongsTo('Surveys.Questions');
    }
}
