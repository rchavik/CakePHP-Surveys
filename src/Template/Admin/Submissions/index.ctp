<?php

$this->extend('Croogo/Core./Common/admin_index');

if (isset($survey)):
    $this->Breadcrumbs->add(__('Surveys'), ['controller' => 'Surveys', 'action' => 'index']);
    $this->Breadcrumbs->add($survey->title, ['controller' => 'Surveys', 'action' => 'view', $survey->id]);
endif;

$this->Breadcrumbs->add(__('Submissions'), ['action' => 'index']);

if ($this->request->query('survey_id')):
    $this->append('action-buttons');
        echo $this->Croogo->adminAction('Export', array_merge(
            $this->request->query, ['export' => true]
        ));
    $this->end();
else:
    $this->set('showActions', false);
endif;

$this->append('table-heading');
?>
<thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('survey_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('point') ?></th>
        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
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
        <td>
            <?= $submission->has('survey') ? $this->Html->link($submission->survey->title, ['controller' => 'Surveys', 'action' => 'view', $submission->survey->id]) : '' ?>

            <?= $submission->has('survey') && ($this->request->query('survey_id') != $submission->survey->id) ?
            $this->Html->link(
                '<i class="fa fa-filter"></i>', [
                'controller' => 'Submissions', 'action' => 'index',
                'survey_id' => $submission->survey->id], ['escapeTitle' => false]) : ''
            ?>
        </td>
        <td><?= $submission->has('user') ? $this->Html->link($submission->user->name, ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
        <td><?= $this->Number->format($submission->point) ?></td>
        <td><?= h($submission->status) ?></td>
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
