<div class="concerts index">
	<h2><?php echo __('Concerts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('stage_id'); ?></th>
			<th><?php echo $this->Paginator->sort('band_id'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($concerts as $concert): ?>
	<tr>
		<td><?php echo h($concert['Concert']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($concert['Stage']['ambient'], array('controller' => 'stages', 'action' => 'view', $concert['Stage']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($concert['Band']['name'], array('controller' => 'bands', 'action' => 'view', $concert['Band']['id'])); ?>
		</td>
		<td><?php echo h($concert['Concert']['schedule']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $concert['Concert']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $concert['Concert']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $concert['Concert']['id']), array(), __('Are you sure you want to delete # %s?', $concert['Concert']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Concert'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bands'), array('controller' => 'bands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Band'), array('controller' => 'bands', 'action' => 'add')); ?> </li>
	</ul>
</div>
