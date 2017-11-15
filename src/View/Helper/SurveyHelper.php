<?php

namespace Surveys\View\Helper;

use Cake\ORM\Entity;
use Cake\Utility\Hash;
use Cake\View\View;
use Cake\View\Helper;
use Surveys\Model\Entity\Survey;

class SurveyHelper extends Helper {

    public $helpers = array(
        'Html', 'Form'
    );

    public function question($index, Entity $question) {
        $options = array();
        $fieldQuestionId = 'submission_details.' . $index . '.question_id';
        $fieldSequenceId = 'submission_details.' . $index . '.sequence_id';
        $fieldValue = 'submission_details.' . $index . '.value';

        if ($question->type == 'multiple') {
            $data = collection($question->question_options)->extract('options')->toArray();
            $value = array_combine($data, $data);
            $options = [
                'label' => $question->questions,
                'type' => 'radio',
                'div' => 'questions-radio',
                'options' => $value,
            ];

            if ($question->required) {
                $options['required'] = true;
                $options['data-parsley-error-message'] = __d('Surveys', 'Please choose an option');
            }
        }

        if ($question->type == 'checkbox') {
            $data = Hash::extract($question->question_options, '{n}.options');
            $value = array_combine($data, $data);
            $options = array(
                'label' => $question->questions,
                'multiple' => 'checkbox',
                'options' => $value,
            );

            if ($question->required) {
                $options['required'] = true;
                $options['data-parsley-error-message'] = __d('Surveys', 'Please select one answer');
            }
        }

        if ($question->type == 'essay') {
            $options = [
                'type' => 'textarea',
                'label' => $question->questions,
            ];
            if ($question->required) {
                $options['required'] = true;
                $options['data-parsley-error-message'] = __d('Surveys', 'Please provide an answer');
            }
        }

        if ($question->type == 'rate') {
            $options = [
                'label' => $question->questions,
                'class' => 'form-control rating',
            ];
            if ($question->required) {
                $options['required'] = true;
                $options['data-parsley-error-message'] = __d('Surveys', 'Please rate accordingly');
            }
        }

        $out = '';

        $out .= $this->Form->input($fieldQuestionId, [
            'type' => 'hidden',
            'value' => $question->id,
        ]);
        $out .= $this->Form->input($fieldSequenceId, [
            'type' => 'hidden',
            'value' => $question->weight,
        ]);
        $out .= $this->Form->input($fieldValue, $options);
        return $this->Html->tag('li', $out);
    }

    public function render(Survey $survey)
    {
        $out = $this->Html->tag('h3', $survey->title);
        $out .= $this->Form->input('survey_id', [
            'type' => 'hidden',
            'value' => $survey->id,
        ]);
        $questions = [];
        foreach ($survey->questions as $i => $question) {
            $questions[] = $this->question($i, $question);
        }

        $out .= $this->Html->tag('ol', implode("\n", $questions), [
            'class' => 'numbered',
        ]);
        return $out;
    }

}
