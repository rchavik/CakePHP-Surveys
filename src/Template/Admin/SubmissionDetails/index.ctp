<?php

$this->extend('Croogo/Core./Common/admin_index');
$this->Breadcrumbs->add(__('Submission Details'), ['action' => 'index']);

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('New Submission Detail'), ['action' => 'add']);
        echo $this->Croogo->adminAction(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Question'), ['controller' => 'Questions', 'action' => 'add']);
        echo $this->Croogo->adminAction(__('List Submissions'), ['controller' => 'Submissions', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Submission'), ['controller' => 'Submissions', 'action' => 'add']);
$this->end();

$this->append('table-heading');
?>
<thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('submission_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('sequence_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('value') ?></th>
        <th scope="col"><?= $this->Paginator->sort('point') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
</thead>
<?php
$this->end();

$this->append('table-body');

?>
<tbody>
    <?php foreach ($submissionDetails as $submissionDetail): ?>
        <?php $actions = []; ?>
    <tr>
        <td><?= $this->Number->format($submissionDetail->id) ?></td>
        <td><?= $submissionDetail->has('question') ? $this->Html->link($submissionDetail->question->id, ['controller' => 'Questions', 'action' => 'view', $submissionDetail->question->id]) : '' ?></td>
        <td><?= $submissionDetail->has('submission') ? $this->Html->link($submissionDetail->submission->id, ['controller' => 'Submissions', 'action' => 'view', $submissionDetail->submission->id]) : '' ?></td>
        <td><?= $this->Number->format($submissionDetail->sequence_id) ?></td>
        <td><?= h($submissionDetail->value) ?></td>
        <td><?= $this->Number->format($submissionDetail->point) ?></td>
        <td><?= h($submissionDetail->created) ?></td>
        <td><?= h($submissionDetail->modified) ?></td>
<?php
        $actions[] = $this->Croogo->adminRowActions($submissionDetail->id);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'view', $submissionDetail->id], ['icon' => 'read']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'edit', $submissionDetail->id], ['icon' => 'update']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'delete', $submissionDetail->id], ['icon' => 'delete']);
?>
        <td class="actions">
            <div class="item-actions">
            <?= implode(' ', $actions); ?>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
<?php

$this->end();

?>
