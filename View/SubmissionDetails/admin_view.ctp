<div class="submissionDetails view">
<h2><?php  echo __('Submission Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($submissionDetail['SubmissionDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($submissionDetail['Question']['id'], array('controller' => 'questions', 'action' => 'view', $submissionDetail['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Submission'); ?></dt>
		<dd>
			<?php echo $this->Html->link($submissionDetail['Submission']['id'], array('controller' => 'submissions', 'action' => 'view', $submissionDetail['Submission']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sequence Id'); ?></dt>
		<dd>
			<?php echo h($submissionDetail['SubmissionDetail']['sequence_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($submissionDetail['SubmissionDetail']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($submissionDetail['SubmissionDetail']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo h($submissionDetail['SubmissionDetail']['point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($submissionDetail['SubmissionDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($submissionDetail['SubmissionDetail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Submission Detail'), array('action' => 'edit', $submissionDetail['SubmissionDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Submission Detail'), array('action' => 'delete', $submissionDetail['SubmissionDetail']['id']), null, __('Are you sure you want to delete # %s?', $submissionDetail['SubmissionDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Submission Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Submission Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Submissions'), array('controller' => 'submissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Submission'), array('controller' => 'submissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
