<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;

class SurveysTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Search.Search');
        $this->hasMany('Questions');
    }

}
