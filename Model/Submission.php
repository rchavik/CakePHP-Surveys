<?php

App::uses('SurveysAppModel', 'Surveys.Model');

class Submission extends SurveysAppModel {

	public $actAs = array(
		'Surveys.DataParser'
	);

	public $belongsTo = array(
		'User' => array(
			'className' => 'Users.user',
			'foreignKey' => 'user_id',
		),
	);

	public $hasMany = array(
		'SubmissionDetail' => array(
			'className' => 'Surveys.SubmissionDetail',
			'dependent' => true
		)
	);
}
