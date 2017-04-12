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
    <div class="related">
        <?php if (!empty($survey->questions)): ?>
        <h4><?= __('Related Questions') ?></h4>
        <table class="table table-sm">
            <tr>
                <th>Question</th>
                <th>Type</th>
                <th>Weight</th>
                <th>Options</th>
            </tr>
            <?php foreach ($survey->questions as $question): ?>
            <tr>
                <td><?= h($question->questions) ?></td>
                <td><?= h($question->type) ?></td>
                <td><?= h($question->weight) ?></td>
                <td>
                    <ul>
                    <?php foreach ($question->question_options as $qoptions): ?>
                        <li><?= h($qoptions->options) ?></li>
                    <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<?php

$this->end();
