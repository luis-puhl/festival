<div class="stages index">
	<h2><?php echo __('Stages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ambient'); ?></th>
			<th><?php echo $this->Paginator->sort('stage_date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($stages as $stage): ?>
	<tr>
		<td><?php echo h($stage['Stage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stage['Event']['city'], array('controller' => 'events', 'action' => 'view', $stage['Event']['id'])); ?>
		</td>
		<td><?php echo h($stage['Stage']['ambient']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['stage_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stage['Stage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stage['Stage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stage['Stage']['id']), array(), __('Are you sure you want to delete # %s?', $stage['Stage']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Stage'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
