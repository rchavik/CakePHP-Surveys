<?php

$this->loadHelper('Surveys.Survey');

$this->Html->css('Surveys.parsley.css', [
    'block' => true,
]);
$this->Html->script('Surveys.parsley.min.js', [
    'block' => true,
    'defer' => true,
]);

echo $this->Form->create($survey, [
    'url' => [
        'plugin' => 'Surveys',
        'controller' => 'Submissions',
        'action' => 'add',
    ],
]);

    echo $this->Survey->render($survey);
    echo $this->Form->submit('Submit', ['class' => 'btn btn-primary']);

echo $this->Form->end();

$this->Js->buffer("$('form').parsley();");
