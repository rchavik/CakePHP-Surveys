<?php

$this->extend('Croogo/Core./Common/admin_view');

$this->Breadcrumbs
    ->add(__d('croogo', 'Surveys'), ['action' => 'index']);

    $this->Breadcrumbs->add($survey->title, $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Edit Survey'), ['action' => 'edit', $survey->id]);
    echo $this->Croogo->adminAction(__('New Question'), [
        'controller' => 'Questions',
        'action' => 'add',
        'survey_id' => $survey->id,
    ]);
$this->end();

$this->append('main');
?>
<div class="surveys view large-9 medium-8 columns">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($survey->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($survey->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($survey->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($survey->modified) ?></td>
        </tr>
    </table>
</div>
<?php
$this->end();
