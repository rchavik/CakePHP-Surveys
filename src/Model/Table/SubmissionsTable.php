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
        $this->belongsTo('Surveys.Surveys');
        $this->hasMany('Surveys.SubmissionDetails');

        $this->searchManager()
            ->value('survey_id')
            ->value('user_id');
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options) {
        if (empty($data['raw_data'])) {
            $data['raw_data'] = json_encode($data);
        }
        if (empty($data['status'])) {
            $data['status'] = true;
        }
        if (!empty($data['submission_details'])) {
            foreach ($data['submission_details'] as &$detail) {
                if (is_array($detail['value'])) {
                    $detail['value'] = implode(',', $detail['value']);
                }
            }
        }
    }

}
