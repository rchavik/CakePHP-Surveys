<?php

App::uses('SurveysAppModel', 'Surveys.Model');

class Survey extends SurveysAppModel {

	public $actAs = array(
		'Containable'
	);

	public $hasMany = array(
		'Question' => array(
			'className' => 'Surveys.Question',
		)
	);
}
