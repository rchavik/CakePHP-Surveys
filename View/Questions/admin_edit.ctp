<?php
$this->extend('/Common/admin_edit');
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Surveys'), array(
		'plugin' => 'surveys', 'controller' => 'surveys',
	))
	->addCrumb(__('Questions'), array('controller' => 'surveys', 'action' => 'index'));
?>
<?php $this->start('actions'); ?>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index'), array('button' => 'default')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index'),array('button' => 'default')); ?> </li>
<?php $this->end(); ?>

	
<?php echo $this->Form->create('Question'); ?>
<div class="row-fluid">
	<div class="span8">	
	<ul class="nav nav-tabs">
		<li><a href="#tab-questions" data-toggle="tab"><?php echo __('Questions'); ?></a></li>
		<li><a href="#tab-answers" data-toggle="tab"><?php echo __('Answer List'); ?></a></li>
	</ul>
	<div class="tab-content">
		<div id="tab-questions" class="tab-pane">
			<?php
				$this->Form->inputDefaults(array(
					'label' => false,
					'class' => 'span10',
					'placeholder' => true,
				));
				echo $this->Form->input('id');
				echo $this->Form->input('survey_id');
				echo $this->Form->input('type', array(
					'type' => 'select',
					'options' => array(
						'essay' => 'Essay',
						'rate' => 'Rate',
						'multiple' => 'Multiple',
						'checkbox' => 'Checkbox',
					)
				));
				echo $this->Form->input('questions');
				echo $this->Form->input('total_sequence');
				echo $this->Form->input('weight');
			?>
		</div>
<?php if ($this->Form->value('Question.type') !== 'essay') : ?>
		<div id="tab-answers" class="tab-pane">
		<?php echo $this->Html->link(__('Add Answer'), array('controller' => 'question_options', 'action' => 'add'), array('button' => 'default')); ?>
		<h3><?php echo __('Answer Choice'); ?></h3>
<?php if (!empty($question['QuestionOption'])): ?>
	<table class="table">
		<tr>
			<th><?php echo __('Sequence Id'); ?></th>
			<th><?php echo __('Options'); ?></th>
			<th><?php echo __('Weight'); ?></th>
			<th><?php echo __('Point'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
<?php foreach ($question['QuestionOption'] as $option): ?>
		<tr>
			<td><?php echo $option['sequence_id']; ?></td>
			<td><?php echo $option['options']; ?></td>
			<td><?php echo $option['weight']; ?></td>
			<td><?php echo $option['point']; ?></td>
			<td><?php echo $option['created']; ?></td>
			<td><?php echo $option['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'question_options', 'action' => 'edit', $option['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'question_options', 'action' => 'edit', $option['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $option['id']), null, __('Are you sure you want to delete # %s?', $option['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
<?php endif; ?>
		</div>
	</div>
	</div>
	<div class="span4">
	<?php
		echo $this->Html->beginBox(__('Publishing')) .
			 $this->Form->button(__('Apply'), array('name' => 'apply', 'class' => 'btn')) .
			 $this->Form->button(__('Save'), array('class' => 'btn btn-primary')) .
			 $this->Html->link(__('Cancel'), array('action' => 'index') ,array('class' => 'cancel btn btn-danger'));
		echo $this->Html->endBox();
?>
	</div>
</div>
</div>
<?php echo $this->Form->end(); ?>
