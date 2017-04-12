<?php

use Croogo\Core\Croogo;

Croogo::hookAdminRowAction('Surveys.Admin/Surveys/index', 'Questions',
    'prefix:admin/plugin:Surveys/controller:Questions/action:index/?survey_id=:id'
);
Croogo::hookAdminRowAction('Surveys.Admin/Questions/index', 'Options',
    'prefix:admin/plugin:Surveys/controller:QuestionOptions/action:index/?question_id=:id'
);
