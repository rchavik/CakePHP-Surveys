<?php

$this->extend('Croogo/Core./Common/admin_index');

$addUrl = [
    'controller' => 'QuestionOptions',
    'action' => 'add',
];

if (isset($survey)):
    $this->Breadcrumbs->add(__('Surveys'), [
        'controller' => 'Surveys', 'action' => 'index',
    ]);
    $this->Breadcrumbs->add($this->Text->truncate($survey->title, 20), [
        'controller' => 'Questions',
        'action' => 'index',
        'survey_id' => $survey->id,
    ]);
endif;

if (isset($question)):
    $this->Breadcrumbs->add($this->Text->truncate($question->questions, 20), [
        'controller' => 'Questions', 'action' => 'view', $question->id,
    ]);
    $addUrl['question_id'] = $question->id;
endif;

$this->Breadcrumbs->add(__('Question Options'), $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('New Question Option'), $addUrl);
$this->end();

$this->append('table-heading');
?>
<thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('sequence_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('options') ?></th>
        <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
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
    <?php foreach ($questionOptions as $questionOption): ?>
        <?php $actions = []; ?>
    <tr>
        <td><?= $this->Number->format($questionOption->id) ?></td>
        <td><?= $questionOption->has('question') ? $this->Html->link($questionOption->question->questions, ['controller' => 'Questions', 'action' => 'view', $questionOption->question->id]) : '' ?></td>
        <td><?= $this->Number->format($questionOption->sequence_id) ?></td>
        <td><?= h($questionOption->options) ?></td>
        <td><?= $this->Number->format($questionOption->weight) ?></td>
        <td><?= $this->Number->format($questionOption->point) ?></td>
        <td><?= h($questionOption->created) ?></td>
        <td><?= h($questionOption->modified) ?></td>
<?php
        $actions[] = $this->Croogo->adminRowActions($questionOption->id);

        $actions[] = $this->Croogo->adminRowAction('', [
            'action' => 'moveUp',
            $questionOption->id,
        ], [
            'icon' => $this->Theme->getIcon('move-up'),
            'method' => 'post',
        ]);

        $actions[] = $this->Croogo->adminRowAction('', [
            'action' => 'moveDown',
            $questionOption->id,
        ], [
            'icon' => $this->Theme->getIcon('move-down'),
            'method' => 'post',
        ]);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'view', $questionOption->id], ['icon' => 'read']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'edit', $questionOption->id], ['icon' => 'update']);
        $actions[] = $this->Croogo->adminRowAction('', ['action' => 'delete', $questionOption->id], ['icon' => 'delete']);
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
