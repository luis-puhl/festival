<div class="bands view">
<h2><?php echo __('Band'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($band['Band']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($band['Band']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Style'); ?></dt>
		<dd>
			<?php echo h($band['Band']['style']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo h($band['Band']['payment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Band'), array('action' => 'edit', $band['Band']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Band'), array('action' => 'delete', $band['Band']['id']), array(), __('Are you sure you want to delete # %s?', $band['Band']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Band'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Concerts'); ?></h3>
	<?php if (!empty($band['Concert'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Stage Id'); ?></th>
		<th><?php echo __('Band Id'); ?></th>
		<th><?php echo __('Schedule'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($band['Concert'] as $concert): ?>
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
