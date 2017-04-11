<?php

$this->extend('Croogo/Core./Common/admin_index');
$this->Breadcrumbs->add(__('Submissions'), ['action' => 'index']);

$this->set('showActions', false);

$this->append('table-heading');
?>
<thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('point') ?></th>
        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
        <th scope="col"><?= $this->Paginator->sort('valid') ?></th>
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
    <?php foreach ($submissions as $submission): ?>
        <?php $actions = []; ?>
    <tr>
        <td><?= $this->Number->format($submission->id) ?></td>
        <td><?= $submission->has('user') ? $this->Html->link($submission->user->name, ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
        <td><?= $this->Number->format($submission->point) ?></td>
        <td><?= h($submission->status) ?></td>
        <td><?= h($submission->valid) ?></td>
        <td><?= h($submission->created) ?></td>
        <td><?= h($submission->modified) ?></td>
<?php
        $actions[] = $this->Croogo->adminRowActions($submission->id);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'view', $submission->id], ['icon' => 'read']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'edit', $submission->id], ['icon' => 'update']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'delete', $submission->id], ['icon' => 'delete']);
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
