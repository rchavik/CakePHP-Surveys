<?php

$this->loadHelper('Surveys.Survey');

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
