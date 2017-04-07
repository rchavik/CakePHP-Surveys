<?php

$this->extend('Croogo/Core./Common/admin_view');

$this->Breadcrumbs
    ->add(__d('croogo', 'Submission Details'), ['action' => 'index']);

    $this->Breadcrumbs->add($submissionDetail->id, $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Edit Submission Detail'), ['action' => 'edit', $submissionDetail->id]);
    echo $this->Croogo->adminAction(__('Delete Submission Detail'), ['action' => 'delete', $submissionDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionDetail->id)]);
    echo $this->Croogo->adminAction(__('List Submission Details'), ['action' => 'index']);
    echo $this->Croogo->adminAction(__('New Submission Detail'), ['action' => 'add']);
        echo $this->Croogo->adminAction(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Question'), ['controller' => 'Questions', 'action' => 'add']);
        echo $this->Croogo->adminAction(__('List Submissions'), ['controller' => 'Submissions', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Submission'), ['controller' => 'Submissions', 'action' => 'add']);
$this->end();

$this->append('main');
?>
<div class="submissionDetails view large-9 medium-8 columns">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $submissionDetail->has('question') ? $this->Html->link($submissionDetail->question->id, ['controller' => 'Questions', 'action' => 'view', $submissionDetail->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submission') ?></th>
            <td><?= $submissionDetail->has('submission') ? $this->Html->link($submissionDetail->submission->id, ['controller' => 'Submissions', 'action' => 'view', $submissionDetail->submission->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($submissionDetail->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($submissionDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence Id') ?></th>
            <td><?= $this->Number->format($submissionDetail->sequence_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point') ?></th>
            <td><?= $this->Number->format($submissionDetail->point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($submissionDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($submissionDetail->modified) ?></td>
        </tr>
    </table>
    <div>
        <label>
            <strong><?= __('Text') ?></strong>
        </label>
        <?= $this->Text->autoParagraph(h($submissionDetail->text)); ?>
    </div>
</div>
<?php
$this->end();
