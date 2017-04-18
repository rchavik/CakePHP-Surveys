<?php

use Croogo\Core\Nav;

Nav::add('sidebar', 'survey', [
    'icon' => 'question',
    'title' => __d('croogo', 'Survey'),
    'url' => '#',
    'children' => [

        'survey' => [
            'title' => 'Survey',
            'url' => [
                'prefix' => 'admin',
                'plugin' => 'Surveys',
                'controller' => 'Surveys',
                'action' => 'index',
            ]
        ],

        'questions' => [
            'title' => 'Questions',
            'url' => [
                'prefix' => 'admin',
                'plugin' => 'Surveys',
                'controller' => 'Questions',
                'action' => 'index',
            ]
        ],

        'submissions' => [
            'title' => 'Submissions',
            'url' => [
                'prefix' => 'admin',
                'plugin' => 'Surveys',
                'controller' => 'Submissions',
                'action' => 'index',
            ]
        ],

    ],
]);
