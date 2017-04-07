<?php

$this->extend('Croogo/Core./Common/admin_view');

$this->Breadcrumbs
    ->add(__d('croogo', 'Submissions'), ['action' => 'index']);

    $this->Breadcrumbs->add($submission->id, $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Edit Submission'), ['action' => 'edit', $submission->id]);
    echo $this->Croogo->adminAction(__('Delete Submission'), ['action' => 'delete', $submission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submission->id)]);
    echo $this->Croogo->adminAction(__('List Submissions'), ['action' => 'index']);
    echo $this->Croogo->adminAction(__('New Submission'), ['action' => 'add']);
        echo $this->Croogo->adminAction(__('List Users'), ['controller' => 'Users', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New User'), ['controller' => 'Users', 'action' => 'add']);
        echo $this->Croogo->adminAction(__('List Submission Details'), ['controller' => 'SubmissionDetails', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Submission Detail'), ['controller' => 'SubmissionDetails', 'action' => 'add']);
$this->end();

$this->append('main');
?>
<div class="submissions view large-9 medium-8 columns">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $submission->has('user') ? $this->Html->link($submission->user->name, ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($submission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point') ?></th>
            <td><?= $this->Number->format($submission->point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($submission->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($submission->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $submission->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valid') ?></th>
            <td><?= $submission->valid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div>
        <label>
            <strong><?= __('Raw Data') ?></strong>
        </label>
        <?= $this->Text->autoParagraph(h($submission->raw_data)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Submission Details') ?></h4>
        <?php if (!empty($submission->submission_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Submission Id') ?></th>
                <th scope="col"><?= __('Sequence Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('Point') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($submission->submission_details as $submissionDetails): ?>
            <tr>
                <td><?= h($submissionDetails->id) ?></td>
                <td><?= h($submissionDetails->question_id) ?></td>
                <td><?= h($submissionDetails->submission_id) ?></td>
                <td><?= h($submissionDetails->sequence_id) ?></td>
                <td><?= h($submissionDetails->value) ?></td>
                <td><?= h($submissionDetails->text) ?></td>
                <td><?= h($submissionDetails->point) ?></td>
                <td><?= h($submissionDetails->created) ?></td>
                <td><?= h($submissionDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SubmissionDetails', 'action' => 'view', $submissionDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SubmissionDetails', 'action' => 'edit', $submissionDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SubmissionDetails', 'action' => 'delete', $submissionDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<?php
$this->end();
