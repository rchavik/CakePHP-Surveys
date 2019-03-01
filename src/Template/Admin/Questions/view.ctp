<?php

$this->extend('Croogo/Core./Common/admin_view');

$this->Breadcrumbs->add(__('Surveys'), ['controller' => 'Surveys', 'action' => 'index']);

$addUrl = ['action' => 'add'];
if (isset($survey)):
    $this->Breadcrumbs->add($survey->title, [
        'controller' => 'Surveys',
        'action' => 'view',
        $survey->id,
    ]);
    $addUrl['survey_id'] = $survey->id;
endif;

$this->Breadcrumbs->add($question->questions, $this->request->here());

$this->append('action-buttons');
    echo $this->Croogo->adminAction(__('Edit'), ['action' => 'edit', $question->id]);
    echo $this->Croogo->adminAction(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]);
    echo $this->Croogo->adminAction(__('New'), $addUrl);
$this->end();

$this->append('main');
?>
<div class="questions view large-9 medium-8 columns">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Survey') ?></th>
            <td><?= $question->has('survey') ? $this->Html->link($question->survey->title, ['controller' => 'Surveys', 'action' => 'view', $question->survey->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($question->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Questions') ?></th>
            <td><?= h($question->questions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Sequence') ?></th>
            <td><?= $this->Number->format($question->total_sequence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($question->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($question->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($question->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Question Options') ?></h4>
        <?php if (!empty($question->question_options)): ?>
        <table class="table table-sm">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Options') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Point') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->question_options as $questionOptions): ?>
            <tr>
                <td><?= h($questionOptions->id) ?></td>
                <td>
                <?=
                    $this->Html->link($questionOptions->options, [
                        'controller' => 'QuestionOptions', 'action' => 'view', $questionOptions->id,
                        '?' => [
                            'question_id' => $question->id,
                            'survey_id' => !empty($survey->id) ? $survey->id : null,
                        ],
                    ])
                ?>
                </td>
                <td><?= h($questionOptions->weight) ?></td>
                <td><?= h($questionOptions->point) ?></td>
                <td><?= h($questionOptions->modified) ?></td>
                <td class="actions">
                    <?=
                        $this->Html->link(__('Edit'), ['controller' => 'QuestionOptions', 'action' => 'edit', $questionOptions->id,
                            '?' => [
                                'question_id' => $question->id,
                                'survey_id' => !empty($survey->id) ? $survey->id : null,
                            ],
                        ])
                    ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuestionOptions', 'action' => 'delete', $questionOptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOptions->id), 'escape' => true]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<?php
$this->end();
