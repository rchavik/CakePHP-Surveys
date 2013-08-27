<?php

class DataParserBehavior extends ModelBehavior  {

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
						if ($record['Checked'] == 1) {
							$temp = array(
								'SubmissionDetail' => array(
									'question_id' => $key,
									'submission_id' => $sid,
									'sequence_id' => $record['Sequence'],
									'value' => $qoption,
									'text' => $record['Checked'],
									'point' => $record['Quantity'],
								)
							);
							$Model->SubmissionDetail->saveAll($temp);
						}
					}
				}
			} else if ($data['type'] == 'essay') {
				foreach ($data['answer'] as $record) { 
					if (!empty($record)) {
						$temp = array(
							'SubmissionDetail' => array(
								'question_id' => $key,
								'submission_id' => $sid,
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
				$point = empty($points['QuestionOption']['point']) ?: 0 ;
				$temp = array(
					'SubmissionDetail' => array(
						'question_id' => $key,
						'submission_id' => $sid,
						'point' => $point,
						'value' => $option['QuestionOption']['options'],
					)
				);
				$Model->SubmissionDetail->saveAll($temp);
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
}
