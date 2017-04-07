<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php

$this->extend('Croogo/Core./Common/admin_edit');

$this->Breadcrumbs->add(__('Questions'), ['action' => 'index']);
$action = $this->request->param('action');

if ($action == 'edit'):
    $this->Breadcrumbs->add($question->id);
else:
    $this->Breadcrumbs->add(__d('croogo', 'Add'), $this->request->here());
endif;

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Delete'),
        ['action' => 'delete', $question->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
    );
    echo $this->Croogo->adminAction(__('List Questions'),
        ['action' => 'index']
    );
    echo $this->Croogo->adminAction(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']);
    echo $this->Croogo->adminAction(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']);
    echo $this->Croogo->adminAction(__('List Question Options'), ['controller' => 'QuestionOptions', 'action' => 'index']);
    echo $this->Croogo->adminAction(__('New Question Option'), ['controller' => 'QuestionOptions', 'action' => 'add']);
$this->end();
$this->append('form-start', $this->Form->create($question));

$this->append('tab-heading');
    echo $this->Croogo->adminTab('Question', '#question');
$this->end();

$this->append('tab-content');
    echo $this->Html->tabStart('question');
        echo $this->Form->input('survey_id', ['options' => $surveys, 'empty' => true]);
        echo $this->Form->input('type', [
            'default' => 'multiple',
            'options' => [
                'essay' => 'Essay',
                'rate' => 'Rate',
                'multiple' => 'Multiple',
                'checkbox' => 'Checkbox',
            ],
        ]);
        echo $this->Form->input('questions');
        echo $this->Form->input('total_sequence');
        echo $this->Form->input('weight');
    echo $this->Html->tabEnd();
    echo $this->Croogo->adminTabs();
$this->end();
