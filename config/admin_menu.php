<?php

use Croogo\Core\Nav;

Nav::add('sidebar', 'survey', [
    'icon' => 'list-ol',
    'title' => __d('croogo', 'Survey'),
    'url' => [
        'prefix' => 'admin',
        'plugin' => 'Surveys',
        'controller' => 'Surveys',
        'action' => 'index',
    ],
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
