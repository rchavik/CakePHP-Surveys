<?php

class SurveysSchema extends CakeSchema {
	
	public $surveys = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(
			'id' => array('column' => array('id'), 'unique' => true),
		),
		'tableParameters' => array(
			'charset' => 'utf8',
			'collate' => 'utf8_unicode_ci',
			'engine' => 'InnoDb'
		),
	);
	
	public $questions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'survey_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'questions' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'total_sequence' => array('type' => 'integer', 'null' =>true, 'default' => NULL),
		'weight' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(
			'id' => array('column' => array('id'), 'unique' => true)
		),
		'tableParameters' => array(
			'charset' => 'utf8',
			'collate' => 'utf8_unicode_ci',
			'engine' => 'InnoDb'
		),
	);
	
	public $submissions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'raw_data' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'point' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(
			'id' => array('column' => array('id'), 'unique' => true),
		),
		'tableParameters' => array(
			'charset' => 'utf8',
			'collate' => 'utf8_unicode_ci',
			'engine' => 'InnoDb'
		),
	);

	public $submission_details = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'submission_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'sequence_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'value' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'text' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'point' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(
			'id' => array('column' => array('id'), 'unique' => true),
		),
		'tableParameters' => array(
			'charset' => 'utf8',
			'collate' => 'utf8_unicode_ci',
			'engine' => 'InnoDb'
		),
	);

	public $question_options = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'sequence_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'options' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'point' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(
			'id' => array('column' => array('id'), 'unique' => true)
		),
		'tableParameters' => array(
			'charset' => 'utf8',
			'collate' => 'utf8_unicode_ci',
			'engine' => 'InnoDb'
		),
	);
}
