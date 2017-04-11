<?php

namespace Surveys\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Table;

class SubmissionsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->addBehavior('Surveys.DataParser');
        $this->belongsTo('Users');
        $this->hasMany('Surveys.SubmissionDetails');
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options) {
        if (empty($data['raw_data'])) {
            $data['raw_data'] = json_encode($data);
        }
    }

}
