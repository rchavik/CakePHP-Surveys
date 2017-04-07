<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;

class QuestionOptionsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Surveys.Questions');
    }
}
