<?php

App::uses('SurveysAppModel', 'Surveys.Model');

class Answer extends SurveysAppModel {
	
	public $belongsTo = array(
		'Question' => array(
			'className' => 'Surveys.Question',
			'foreignKey' => 'question_id',
		),
		'User' => array(
			'className' => 'Users.user',
			'foreignKey' => 'user_id',
		),
	);
}
