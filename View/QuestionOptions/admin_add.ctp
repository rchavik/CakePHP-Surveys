<div class="questionOptions form">
<?php echo $this->Form->create('QuestionOption'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Question Option'); ?></legend>
	<?php
		echo $this->Form->input('question_id');
		echo $this->Form->input('sequence_id', array(
			'type' => 'text',
		));
		echo $this->Form->input('options');
		echo $this->Form->input('weight');
		echo $this->Form->input('point');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Question Options'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
