<?php

App::uses('SurveysAppModel', 'Surveys.Model');

class Question extends SurveysAppModel {
	
	public $actAs = array(
		'Containable'
	);

	public $hasMany = array(
		'QuestionOption' => array(
			'className' => 'Surveys.QuestionOption',
		),
	);

	public $belongsTo = array(
		'Survey' => array(
			'ClassName' => 'Surveys.Survey',
			'foreignKey' => 'survey_id'
		),
	);
}
