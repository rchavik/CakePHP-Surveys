<?php

namespace Surveys\View\Helper;

use Cake\View\Helper;

class SurveyHelper extends Helper {

	public $helpers = array(
		'Html', 'Form'
	);

	public function __construct(View $view, $settings = array()) {
		parent::__construct($view, $settings);
	}

	public function Question($type, $query = array()) {
		$options = array();
		$qid = 'Question.'.$query['Question']['id'];
		if ($type == 'multiple') {
			$data = Hash::extract($query['QuestionOption'], '{n}.options');
			$value = array_combine($data, $data);
			$options = array(
				'legend' => $query['Question']['questions'],
				'type' => 'radio',
				'div' => 'questions-radio',
				'options' => $value,
			);
		}

		if ($type == 'checkbox') {
			$question ='<legend>'.$query['Question']['questions'].'</legend>';
			$data = Hash::extract($query['QuestionOption'], '{n}.options');
			$value = array_combine($data, $data);
			$options = array(
				'label' => false,
				'multiple' => 'checkbox',
				'options' => $value,
			);
		}

		if ($type == 'essay') {
			$options = array(
				'label' => false,
			);
		}
		return $this->Form->input($qid , $options);
	}
}
