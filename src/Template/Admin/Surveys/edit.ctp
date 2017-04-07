<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php

$this->extend('Croogo/Core./Common/admin_edit');

$this->Breadcrumbs->add(__('Surveys'), ['action' => 'index']);
$action = $this->request->param('action');

if ($action == 'edit'):
    $this->Breadcrumbs->add($survey->title);
else:
    $this->Breadcrumbs->add(__d('croogo', 'Add'), $this->request->here());
endif;

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Delete'),
        ['action' => 'delete', $survey->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]
    );
    echo $this->Croogo->adminAction(__('List Surveys'),
        ['action' => 'index']
    );
$this->end();
$this->append('form-start', $this->Form->create($survey));

$this->append('tab-heading');
    echo $this->Croogo->adminTab('Survey', '#survey');
$this->end();

$this->append('tab-content');
    echo $this->Html->tabStart('survey');
        echo $this->Form->input('title');
    echo $this->Html->tabEnd();
    echo $this->Croogo->adminTabs();
$this->end();
