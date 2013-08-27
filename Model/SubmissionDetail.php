<?php

App::uses('SurveysAppModel', 'Surveys.Model');

class SubmissionDetail extends SurveysAppModel {

	public $belongsTo = array(
		'Question' => array(
			'className' => 'Surveys.Question',
			'foreignKey' => 'question_id',
		),
		'Submission' => array(
			'className' => 'Surveys.Submission',
			'foreignKey' => 'submission_id',
		),
	);
}
