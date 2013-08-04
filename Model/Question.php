<?php

App::uses('SurveysAppModel', 'Surveys.Model');

class Question extends SurveysAppModel {
	
	public $actAs = array(
		'Containable'
	);

	public $hasMany = array(
		'Answer' => array(
			'className' => 'Surveys.Answer',
		),
	);

	public $belongsTo = array(
		'Survey' => array(
			'ClassName' => 'Surveys.Survey',
			'foreignKey' => 'survey_id'
		),
	);
}
