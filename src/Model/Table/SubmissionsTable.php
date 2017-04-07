<?php

namespace Surveys\Model\Table;

use Cake\ORM\Table;

class SubmissionsTable extends Table {

	public function initialize(array $config)
	{
		parent::initialize($config);
		$this->addBehavior('Search.Search');
		$this->addBehavior('Surveys.DataParser');
		$this->belongsTo('Users');
		$this->hasMany('Surveys.SubmissionDetails');
	}

}
