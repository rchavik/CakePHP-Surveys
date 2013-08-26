<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Question'); ?></legend>
	<?php
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
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($this->Form->value('Question.type') !== 'essay') : ?>
		<li>
		<?php
			echo $this->Html->link(__('Add Answer'), array(
				'controller' => 'question_options',
				'action' => 'add',
				)
			);
		?>
		</li>
		<?php endif; ?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Question.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
	</ul>
</div>
