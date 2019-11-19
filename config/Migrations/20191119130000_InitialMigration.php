<?php

use Phinx\Migration\AbstractMigration;

class InitialMigration extends AbstractMigration
{
	public function up()
	{
		$this->table('surveys')
			->addColumn('title', 'string', [
				'null' => false, 'default' => NULL, 'length' => 100,
			])
			->addColumn('created', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->addColumn('modified', 'datetime', [
				'null' => true, 'default' => NULL
			])
			->create();

		$this->table('questions')
			->addColumn('survey_id', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10
			])
			->addColumn('type', 'string', [
				'null' => false, 'default' => NULL, 'length' => 50,
			])
			->addColumn('questions', 'string', [
				'null' => false, 'default' => NULL,
			])
			->addColumn('total_sequence', 'integer', [
				'null' =>true, 'default' => NULL,
			])
			->addColumn('weight', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10
			])
			->addColumn('required', 'boolean', [
				'null' => false, 'default' => true,
			])
			->addColumn('created', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->addColumn('modified', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->create();

		$this->table('submissions')
			->addColumn('survey_id', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10
			])
			->addColumn('user_id', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10,
			])
			->addColumn('raw_data', 'text', [
				'null' => false, 'default' => NULL,
			])
			->addColumn('point', 'integer', [
				'null' => true, 'default' => NULL, 'length' => 10
			])
			->addColumn('status', 'boolean', [
				'null' => true, 'default' => true
			])
			->addColumn('created', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->addColumn('modified', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->create();

		$this->table('submission_details')
			->addColumn( 'question_id', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10
			])
			->addColumn('submission_id', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10
			])
			->addColumn('sequence_id', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10
			])
			->addColumn('value', 'string', [
				'null' => false, 'default' => NULL
			])
			->addColumn('text', 'text', [
				'null' => true, 'default' => NULL
			])
			->addColumn('point', 'integer', [
				'null' => true, 'default' => NULL
			])
			->addColumn('created', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->addColumn('modified', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->create();

		$this->table('question_options')
			->addColumn('question_id', 'integer', [
				'null' => false, 'default' => NULL, 'length' => 10,
			])
			->addColumn('sequence_id', 'integer', [
				'null' => true, 'default' => NULL, 'length' => 10
			])
			->addColumn('options', 'string', [
				'null' => true, 'default' => NULL,
			])
			->addColumn('weight', 'integer', [
				'null' => true, 'default' => NULL, 'length' => 10
			])
			->addColumn('point', 'integer', [
				'null' => true, 'default' => NULL
			])
			->addColumn('created', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->addColumn('modified', 'datetime', [
				'null' => true, 'default' => NULL,
			])
			->create();
	}

	public function down()
	{
		$this->dropTable('question_options');
		$this->dropTable('submission_details');
		$this->dropTable('submissions');
		$this->dropTable('questions');
		$this->dropTable('surveys');
	}

}
