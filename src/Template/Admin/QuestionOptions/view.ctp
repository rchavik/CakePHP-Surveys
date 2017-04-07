<?php

$this->extend('Croogo/Core./Common/admin_view');

$this->Breadcrumbs
    ->add(__d('croogo', 'Question Options'), ['action' => 'index']);

    $this->Breadcrumbs->add($questionOption->id, $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Edit Question Option'), ['action' => 'edit', $questionOption->id]);
    echo $this->Croogo->adminAction(__('Delete Question Option'), ['action' => 'delete', $questionOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id)]);
    echo $this->Croogo->adminAction(__('List Question Options'), ['action' => 'index']);
    echo $this->Croogo->adminAction(__('New Question Option'), ['action' => 'add']);
        echo $this->Croogo->adminAction(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']);
        echo $this->Croogo->adminAction(__('New Question'), ['controller' => 'Questions', 'action' => 'add']);
$this->end();

$this->append('main');
?>
<div class="questionOptions view large-9 medium-8 columns">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $questionOption->has('question') ? $this->Html->link($questionOption->question->id, ['controller' => 'Questions', 'action' => 'view', $questionOption->question->id]) : '' ?></td>
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
