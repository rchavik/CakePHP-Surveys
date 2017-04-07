<?php

$this->extend('Croogo/Core./Common/admin_index');
$this->Breadcrumbs->add(__('Questions'), ['action' => 'index']);

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('New Question'), ['action' => 'add']);
        echo $this->Croogo->adminAction(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']);
        echo $this->Croogo->adminAction(__('List Question Options'), ['controller' => 'QuestionOptions', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Question Option'), ['controller' => 'QuestionOptions', 'action' => 'add']);
$this->end();

$this->append('table-heading');
?>
<thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('survey_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
        <th scope="col"><?= $this->Paginator->sort('questions') ?></th>
        <th scope="col"><?= $this->Paginator->sort('total_sequence') ?></th>
        <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
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
    <?php foreach ($questions as $question): ?>
        <?php $actions = []; ?>
    <tr>
        <td><?= $this->Number->format($question->id) ?></td>
        <td><?= $question->has('survey') ? $this->Html->link($question->survey->title, ['controller' => 'Surveys', 'action' => 'view', $question->survey->id]) : '' ?></td>
        <td><?= h($question->type) ?></td>
        <td><?= h($question->questions) ?></td>
        <td><?= $this->Number->format($question->total_sequence) ?></td>
        <td><?= $this->Number->format($question->weight) ?></td>
        <td><?= h($question->created) ?></td>
        <td><?= h($question->modified) ?></td>
<?php
        $actions[] = $this->Croogo->adminRowActions($question->id);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'view', $question->id], ['icon' => 'read']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'edit', $question->id], ['icon' => 'update']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'delete', $question->id], ['icon' => 'delete']);
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
