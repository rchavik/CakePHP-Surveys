<div class="submissionDetails index">
	<h2><?php echo __('Submission Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('submission_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sequence_id'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('text'); ?></th>
			<th><?php echo $this->Paginator->sort('point'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($submissionDetails as $submissionDetail): ?>
	<tr>
		<td><?php echo h($submissionDetail['SubmissionDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($submissionDetail['Question']['id'], array('controller' => 'questions', 'action' => 'view', $submissionDetail['Question']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($submissionDetail['Submission']['id'], array('controller' => 'submissions', 'action' => 'view', $submissionDetail['Submission']['id'])); ?>
		</td>
		<td><?php echo h($submissionDetail['SubmissionDetail']['sequence_id']); ?>&nbsp;</td>
		<td><?php echo h($submissionDetail['SubmissionDetail']['value']); ?>&nbsp;</td>
		<td><?php echo h($submissionDetail['SubmissionDetail']['text']); ?>&nbsp;</td>
		<td><?php echo h($submissionDetail['SubmissionDetail']['point']); ?>&nbsp;</td>
		<td><?php echo h($submissionDetail['SubmissionDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($submissionDetail['SubmissionDetail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $submissionDetail['SubmissionDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $submissionDetail['SubmissionDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $submissionDetail['SubmissionDetail']['id']), null, __('Are you sure you want to delete # %s?', $submissionDetail['SubmissionDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Submission Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Submissions'), array('controller' => 'submissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Submission'), array('controller' => 'submissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
