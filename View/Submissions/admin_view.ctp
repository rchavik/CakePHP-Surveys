<div class="submissions view">
<h2><?php echo __('Submission'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($submission['Submission']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($submission['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Raw Data'); ?></dt>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo h($submission['Submission']['point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($submission['Submission']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($submission['Submission']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Submission Details'); ?></h3>
	<?php if (!empty($submission['SubmissionDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Submission Id'); ?></th>
		<th><?php echo __('Sequence Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('Point'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
	</tr>
	<?php foreach ($submission['SubmissionDetail'] as $submissionDetail): ?>
		<tr>
			<td><?php echo $submissionDetail['id']; ?></td>
			<td><?php echo $submissionDetail['question_id']; ?></td>
			<td><?php echo $submissionDetail['submission_id']; ?></td>
			<td><?php echo $submissionDetail['sequence_id']; ?></td>
			<td><?php echo $submissionDetail['value']; ?></td>
			<td><?php echo $submissionDetail['text']; ?></td>
			<td><?php echo $submissionDetail['point']; ?></td>
			<td><?php echo $submissionDetail['created']; ?></td>
			<td><?php echo $submissionDetail['modified']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Submission Detail'), array('controller' => 'submission_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
