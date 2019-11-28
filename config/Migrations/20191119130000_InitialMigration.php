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
            ->addTimestamps('created', 'modified')
            ->create();

        $this->table('questions')
            ->addColumn('survey_id', 'integer', [
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'null' => false, 'length' => 50,
            ])
            ->addColumn('questions', 'string', [
                'null' => false, 'length' => 1024,
            ])
            ->addColumn('short_description', 'string', [
                'null' => false, 'length' => 50,
            ])
            ->addColumn('pivot_type', 'integer', [
                'null' => true,
            ])
            ->addColumn('total_sequence', 'integer', [
                'null' => true, 'default' => NULL,
            ])
            ->addColumn('weight', 'integer', [
                'null' => false, 'default' => NULL,
            ])
            ->addColumn('required', 'boolean', [
                'null' => false, 'default' => true,
            ])
            ->addTimestamps('created', 'modified')
            ->addForeignKey('survey_id', 'surveys', ['id'], [
                'constraint' => 'fk_questions2surveys',
                'delete' => 'RESTRICT',
            ])
            ->create();

        $this->table('submissions')
            ->addColumn('survey_id', 'integer', [
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'null' => true, 'default' => NULL,
            ])
            ->addColumn('raw_data', 'text', [
                'null' => false,
            ])
            ->addColumn('point', 'integer', [
                'null' => true, 'default' => NULL,
            ])
            ->addColumn('status', 'boolean', [
                'null' => true, 'default' => true
            ])
            ->addTimestamps('created', 'modified')
            ->addForeignKey('survey_id', 'surveys', ['id'], [
                'constraint' => 'fk_submissions2surveys',
                'delete' => 'RESTRICT',
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
            ->addTimestamps('created', 'modified')
            ->addForeignKey('submission_id', 'submissions', ['id'], [
                'constraint' => 'fk_submission_details2submissions',
                'delete' => 'RESTRICT',
            ])
            ->addForeignKey('question_id', 'questions', ['id'], [
                'constraint' => 'fk_submission_details2questions',
                'delete' => 'RESTRICT',
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
            ->addTimestamps('created', 'modified')
            ->addForeignKey('question_id', 'questions', ['id'], [
                'constraint' => 'fk_question_options2questions',
                'delete' => 'RESTRICT',
            ])
            ->create();
    }

    public function down()
    {
        $this->table('question_options')->drop()->save();
        $this->table('submission_details')->drop()->save();
        $this->table('submissions')->drop()->save();
        $this->table('questions')->drop()->save();
        $this->table('surveys')->drop()->save();
    }

}
