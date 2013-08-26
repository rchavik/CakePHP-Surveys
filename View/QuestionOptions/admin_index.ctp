<div class="questionOptions index">
	<h2><?php echo __('Question Options'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sequence_id'); ?></th>
			<th><?php echo $this->Paginator->sort('options'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('point'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionOptions as $questionOption): ?>
	<tr>
		<td><?php echo h($questionOption['QuestionOption']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($questionOption['Question']['id'], array('controller' => 'questions', 'action' => 'view', $questionOption['Question']['id'])); ?>
		</td>
		<td><?php echo h($questionOption['QuestionOption']['sequence_id']); ?>&nbsp;</td>
		<td><?php echo h($questionOption['QuestionOption']['options']); ?>&nbsp;</td>
		<td><?php echo h($questionOption['QuestionOption']['weight']); ?>&nbsp;</td>
		<td><?php echo h($questionOption['QuestionOption']['point']); ?>&nbsp;</td>
		<td><?php echo h($questionOption['QuestionOption']['created']); ?>&nbsp;</td>
		<td><?php echo h($questionOption['QuestionOption']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $questionOption['QuestionOption']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionOption['QuestionOption']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionOption['QuestionOption']['id']), null, __('Are you sure you want to delete # %s?', $questionOption['QuestionOption']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Question Option'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
