<?php

$this->extend('Croogo/Core./Common/admin_view');

if ($questionOption->has('question') && $questionOption->question->has('survey')):
    $this->Breadcrumbs->add('Surveys', [
        'controller' => 'Surveys',
    ]);
    $this->Breadcrumbs->add($this->Text->truncate($questionOption->question->survey->title, 10), [
        'controller' => 'Surveys',
        'action' => 'view',
        $questionOption->question->survey_id,
    ], [
        'data-title' => $questionOption->question->survey->title,
    ]);
    $this->Breadcrumbs->add('Questions', [
        'controller' => 'Questions',
        'action' => 'index',
        'survey_id' => $questionOption->question->survey_id,
    ]);
    $this->Breadcrumbs->add($this->Text->truncate($questionOption->question->questions, 10), [
        'controller' => 'Questions',
        'action' => 'index',
        'survey_id' => $questionOption->question->survey_id,
    ], [
        'data-title' => $questionOption->question->questions,
    ]);
endif;

$this->Breadcrumbs
    ->add(__d('croogo', 'Question Options'), ['action' => 'index']);

    $this->Breadcrumbs->add($questionOption->id, $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Edit'), ['action' => 'edit', $questionOption->id]);
    echo $this->Croogo->adminAction(__('Delete'), ['action' => 'delete', $questionOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id)]);
    echo $this->Croogo->adminAction(__('List'), ['action' => 'index']);
    echo $this->Croogo->adminAction(__('New'), ['action' => 'add']);
$this->end();

$this->append('main');
?>
<div class="questionOptions view large-9 medium-8 columns">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $questionOption->has('question') ? $this->Html->link($questionOption->question->questions, ['controller' => 'Questions', 'action' => 'view', $questionOption->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Options') ?></th>
            <td><?= h($questionOption->options) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($questionOption->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence Id') ?></th>
            <td><?= $this->Number->format($questionOption->sequence_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($questionOption->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point') ?></th>
            <td><?= $this->Number->format($questionOption->point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($questionOption->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($questionOption->modified) ?></td>
        </tr>
    </table>
</div>
<?php
$this->end();
