<?php

$this->extend('Croogo/Core./Common/admin_view');
$this->Croogo->adminScript('Surveys.admin');

$this->Breadcrumbs
    ->add(__d('croogo', 'Submissions'), ['action' => 'index']);

    $this->Breadcrumbs->add($submission->id, $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('List Submissions'), ['action' => 'index']);
$this->end();

$this->append('page-footer', $this->element('Croogo/Core.admin/modal', array(
    'id' => 'survey-modal',
    'class' => 'hide',
)));

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
    </table>
    <div>
        <label>
            <strong><?= __('Raw Data') ?></strong>
        </label>
        <p>
        <?=
            $this->Html->link('View', '#', [
                'class' => 'survey-view',
                'data-title' => 'View Raw Data',
                'data-content' => print_r(json_decode($submission->raw_data, true), true),
                'escape' => true,
            ]);
        ?>
        </p>
    </div>
    <div class="related">
        <h4><?= __('Related Submission Details') ?></h4>
        <?php if (!empty($submission->submission_details)): ?>
        <table class="table table-sm table-responsive">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Submission Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Sequence Id') ?></th>
                <th scope="col"><?= __('Question') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('Point') ?></th>
                <th scope="col"><?= __('Created') ?></th>
            </tr>
            <?php foreach ($submission->submission_details as $submissionDetails): ?>
            <tr>
                <td><?= h($submissionDetails->id) ?></td>
                <td><?= h($submissionDetails->submission_id) ?></td>
                <td><?= h($submissionDetails->question_id) ?></td>
                <td><?= h($submissionDetails->sequence_id) ?></td>
                <td><?= h($submissionDetails->question->questions) ?></td>
                <td><?= h($submissionDetails->value) ?></td>
                <td><?= h($submissionDetails->text) ?></td>
                <td><?= h($submissionDetails->point) ?></td>
                <td><?= h($submissionDetails->created) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<?php
$this->end();
