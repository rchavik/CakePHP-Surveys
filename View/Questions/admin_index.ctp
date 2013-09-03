<?php
$this->extend('/Common/admin_index');
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Surveys'), array(
		'plugin' => 'surveys', 'controller' => 'surveys'
	));
?>
<?php $this->start('actions'); ?>
	<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add'), array('button' => 'default')); ?></li>
	<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index'), array('button' => 'default')); ?> </li>
	<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add'), array('button' => 'default')); ?> </li>
<?php $this->end(); ?>

<h2 class="hidden-desktop"><?php echo __('Survey Questions');?></h2>
<table class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('survey_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('questions'); ?></th>
			<th><?php echo $this->Paginator->sort('total_sequence'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
<?php
$i = 0;
foreach ($questions as $question):
	$actions = array();
	$class = null;
	if ($i++ % 2 == 0) {
		$class= 'class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($question['Survey']['title'], array('controller' => 'surveys', 'action' => 'edit', $question['Survey']['id'])); ?>
		</td>
		<td><?php echo h($question['Question']['type']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['questions']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['total_sequence']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['weight']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['created']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['modified']); ?>&nbsp;</td>
		<td>
		<?php
			$actions[] = $this->Croogo->adminRowAction('',
				array('action' => 'edit', $question['Question']['id']),
				array('icon' => 'zoom-in', 'tooltip' => __('View'))
			);
			$actions[] = $this->Croogo->adminRowAction('',
				array('action' => 'edit', $question['Question']['id']),
				array('icon' => 'pencil', 'tooltip' => __('Edit'))
			);
			$actions[] = $this->Croogo->adminRowAction('',
				array('action' => 'delete', $question['Question']['id']),
				array('icon' => 'trash', 'tooltip' => __('Delete')),
				__('Are you sure you want to delete # %s?', $question['Question']['id'])
			);
			 echo $this->Html->div('item-actions', implode(' ', $actions));
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
