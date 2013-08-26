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
		$rawdata = $Model->data[$Model->alias]['raw_data'];
		if ($created) {
			return $this->_saveDetail($Model, $rawdata);
		}
		return true;
	}

	protected function _saveDetail (&$Model, $rawdatas) {
		$rawdata = json_decode($rawdatas, true);
		$id = $Model->data[$Model->alias]['id'];

		$this->log($rawdata);
		$details = ClassRegistry::init('Surveys.QuestionOption');
		foreach ($rawdata['Question'] as $key => $data) {

			/*
			if (is_array($data)) {
				foreach ($data as $record) {
					if (is_array($record)) {
						$this->log($record);
						$temp = array(
							'question_id' => $key,
							'submission_id' => $record,
						);
					}
				}	
			}
			$temp = array(
				'SubmissionDetail' => array(
					'question_id' => $key,
					'submission_id' => $id,
					'value' => $data
				)
			);
			 */


		}
	}

	protected function _calculatePoints (&$Model, $points) {
		
	}
}
