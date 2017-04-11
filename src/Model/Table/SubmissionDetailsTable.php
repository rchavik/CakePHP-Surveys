<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;

class SubmissionDetailsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');

        $this->belongsTo('Surveys.Questions');
        $this->belongsTo('Surveys.Submissions');
    }

    public function update_point($sid = null) {
        $getSubmission = $this->find('all', array(
            'conditions' => array(
                'submission_id' => $sid,
                'Question.type' => 'multiple'
            ),
            'contain' => array('Question'),
        ));
        if ($getSubmission) {
            foreach ($getSubmission as $record) {
                $this->Question->QuestionOption->recursive = -1;
                $getPoint = $this->Question->QuestionOption->find('first', array(
                    'conditions' => array(
                        'id' => $record['SubmissionDetail']['value']
                    )
                ));
                $point = $getPoint['QuestionOption']['point'];
                $this->id = $record['SubmissionDetail']['id'];
                $this->saveField('point', $point);
            }
            $this->calculatePoints($sid);
        } else {
            $this->log('User Point Cannot be updated.');
            return;
        }
        return;
    }

    protected function calculatePoints($id) {
        $this->recursive = -1;
        $data = $this->Submission->find('first', array(
            'conditions' => array(
                'Submission.id' => $id
            ),
            'contains' => array('SubmissionDetail')
        ));
        $this->log($data);
        $point = 0;
        foreach ($data['SubmissionDetail'] as $record) {
            $point += $record['point'];
        }
        $this->Submission->id = $id;
        $this->Submission->saveField('point', $point);
        return;
    }
}
