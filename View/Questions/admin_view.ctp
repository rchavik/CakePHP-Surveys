<div class="questions view">
<h2><?php  echo __('Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Survey'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['Survey']['title'], array('controller' => 'surveys', 'action' => 'view', $question['Survey']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($question['Question']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questions'); ?></dt>
		<dd>
			<?php echo h($question['Question']['questions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Sequence'); ?></dt>
		<dd>
			<?php echo h($question['Question']['total_sequence']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($question['Question']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($question['Question']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($question['Question']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($this->Form->value('Question.type') !== 'essay') : ?>
			<li><?php echo $this->Html->link(__('Add Answer'), array('controller' => 'question_options', 'action' => 'add')); ?></li>
        <?php endif; ?>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), null, __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Answer Choice'); ?></h3>
	<?php if (!empty($question['QuestionOption'])): ?>
	<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Sequence Id'); ?></th>
			<th><?php echo __('Options'); ?></th>
			<th><?php echo __('Weight'); ?></th>
			<th><?php echo __('Point'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	<?php
	foreach ($question['QuestionOption'] as $option): ?>
		<tr>
			<td><?php echo $option['sequence_id']; ?></td>
			<td><?php echo $option['options']; ?></td>
			<td><?php echo $option['weight']; ?></td>
			<td><?php echo $option['point']; ?></td>
			<td><?php echo $option['created']; ?></td>
			<td><?php echo $option['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'question_options', 'action' => 'view', $option['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'question_options', 'action' => 'edit', $option['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $option['id']), null, __('Are you sure you want to delete # %s?', $option['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
</div>
