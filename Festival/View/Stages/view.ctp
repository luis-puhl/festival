<div class="stages view">
<h2><?php echo __('Stage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stage['Event']['city'], array('controller' => 'events', 'action' => 'view', $stage['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ambient'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['ambient']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stage Date'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['stage_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stage'), array('action' => 'edit', $stage['Stage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stage'), array('action' => 'delete', $stage['Stage']['id']), array(), __('Are you sure you want to delete # %s?', $stage['Stage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Concerts'); ?></h3>
	<?php if (!empty($stage['Concert'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Stage Id'); ?></th>
		<th><?php echo __('Band Id'); ?></th>
		<th><?php echo __('Schedule'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stage['Concert'] as $concert): ?>
		<tr>
			<td><?php echo $concert['id']; ?></td>
			<td><?php echo $concert['stage_id']; ?></td>
			<td><?php echo $concert['band_id']; ?></td>
			<td><?php echo $concert['schedule']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'concerts', 'action' => 'view', $concert['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'concerts', 'action' => 'edit', $concert['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'concerts', 'action' => 'delete', $concert['id']), array(), __('Are you sure you want to delete # %s?', $concert['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
