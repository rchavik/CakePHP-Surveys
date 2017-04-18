<?php

$header = [
    __d('Surveys', 'Id'), __d('Surveys', 'Survey Id'), __d('Surveys', 'Survey Title'),
    __d('Surveys', 'User Id'), __d('Surveys', 'Username'), __d('Surveys', 'User Email'),
    __d('Surveys', 'Status'), __d('Surveys', 'Created'),
];

foreach ($questions as $question):
    $header[] = $question->questions;
endforeach;

echo implode($_delimiter, $header) . "\r\n";

foreach ($submissions as $submission):
    $row = [
        $submission->id, $submission->survey_id, $submission->survey->title,
        $submission->user->id, $submission->user->username, $submission->user->uemail,
        $submission->status, $submission->created,
    ];
    foreach ($submission->submission_details as $detail):
        $row[] = $detail->value;
    endforeach;
    echo implode($_delimiter, $row) . "\r\n";
endforeach;
