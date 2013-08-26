<?php

App::uses('SurveysAppModel', 'Surveys.Model');

class QuestionOption extends SurveysAppModel {
	
	public $actAs = array(
		'Containable'
	);

	public $belongsTo = array(
		'Question' => array(
			'ClassName' => 'Surveys.Question',
			'foreignKey' => 'question_id'
		),
	);
}
