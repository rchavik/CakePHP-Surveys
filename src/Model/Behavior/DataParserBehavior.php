<?php

namespace Surveys\Model\Behavior;

use Cake\ORM\Behavior;

class DataParserBehavior extends Behavior  {

    var $__settings = array();

    function setup(&$Model, $settings = array()) {
        if (!isset($this->__settings[$Model->alias])) {
            $this->__settings[$Model->alias] = array(
                'foreignKey' => 'submission_id',
            );
        }
        $this->__settings[$Model->alias] = Set::merge($this->__settings[$Model->alias], $settings);
    }

    public function afterSave(&$Model, $created) {
        if(isset($Model->data[$Model->alias]['raw_data'])) {
            $rawdata = $Model->data[$Model->alias]['raw_data'];
            if ($created) {
                return $this->_saveDetail($Model, $rawdata);
            }
            return true;
        }
        return false;
    }

    protected function _saveDetail (&$Model, $rawdatas) {
        $rawdata = json_decode($rawdatas, true);
        $sid = $Model->data[$Model->alias]['id'];
        foreach ($rawdata[$Model->alias] as $key => $data) {
            if ($data['type'] == 'checkbox') {
                $extracts = Hash::extract($data['answer'], '{n}');
                foreach ($extracts as $records) {
                    foreach ($records as $qoption => $record) {
                        $text = $this->_getDetailOption($qoption);
                        if ($record['Checked'] == 1) {
                            $temp = array(
                                'SubmissionDetail' => array(
                                    'question_id' => $key,
                                    'submission_id' => $sid,
                                    'sequence_id' => $record['Sequence'],
                                    'value' => $qoption,
                                    'text' => $text['QuestionOption']['options'],
                                    'point' => $record['Quantity'],
                                )
                            );
                            $Model->SubmissionDetail->saveAll($temp);
                        }
                    }
                }
            } else if ($data['type'] == 'essay') {
                foreach ($data['answer'] as $eid => $record) {
                    if (!empty($record)) {
                        $temp = array(
                            'SubmissionDetail' => array(
                                'question_id' => $key,
                                'submission_id' => $sid,
                                'sequence_id' => 1,
                                'value' => $eid,
                                'text' => $record,
                                'point' => 1
                            )
                        );
                        $Model->SubmissionDetail->saveAll($temp);
                    }
                }
            } else if ($data['type'] == 'multiple') {
                $option = ClassRegistry::init('Surveys.QuestionOption')->find('first', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'id' => $data['answer']
                    ),
                ));
                $point = !empty($option['QuestionOption']['point']) ? $option['QuestionOption']['point']: 0 ;
                $temp = array(
                    'SubmissionDetail' => array(
                        'question_id' => $key,
                        'submission_id' => $sid,
                        'sequence_id' => $option['QuestionOption']['sequence_id'],
                        'value' => $option['QuestionOption']['id'],
                        'text' => $option['QuestionOption']['options'],
                        'point' => $point,
                    )
                );
                $Model->SubmissionDetail->saveAll($temp);
            } else if ($data['type'] == 'rate') {
                foreach ($data['answer'] as $rid => $record) {
                    $option = ClassRegistry::init('Surveys.QuestionOption')->find('first', array(
                        'recursive' => -1,
                        'conditions' => array(
                            'id' => $record
                        )
                    ));
                    $point = !empty($option['QuestionOption']['point']) ? $option['QuestionOption']['point']: 0 ;
                    $temp = array(
                        'SubmissionDetail' => array(
                            'question_id' => $key,
                            'submission_id' => $sid,
                            'sequence_id' => $rid,
                            'value' => $rid,
                            'text' => $option['QuestionOption']['options'],
                            'point' => $point,
                        )
                    );
                    $Model->SubmissionDetail->saveAll($temp);
                }

            }
        }
        $this->_calculatePoints($Model, $sid);
    }

    protected function _calculatePoints (&$Model, $id) {
        $data = ClassRegistry::init('Surveys.SubmissionDetail')->find('all', array(
            'conditions' => array(
                'submission_id' => $id
            )
        ));
        $point = 0;
        foreach ($data as $record) {
            $point += $record['SubmissionDetail']['point'];
        }
        $Model->id = $id;
        $Model->saveField('point', $point);
    }

    protected function _getDetailOption ($id) {
        $data = ClassRegistry::init('Surveys.QuestionOption')->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'id' => $id
            )
        ));
        return $data;
    }
}
