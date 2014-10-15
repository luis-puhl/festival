<div class="concerts view">
<h2><?php echo __('Concert'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stage'); ?></dt>
		<dd>
			<?php echo $this->Html->link($concert['Stage']['ambient'], array('controller' => 'stages', 'action' => 'view', $concert['Stage']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Band'); ?></dt>
		<dd>
			<?php echo $this->Html->link($concert['Band']['name'], array('controller' => 'bands', 'action' => 'view', $concert['Band']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['schedule']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Concert'), array('action' => 'edit', $concert['Concert']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Concert'), array('action' => 'delete', $concert['Concert']['id']), array(), __('Are you sure you want to delete # %s?', $concert['Concert']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bands'), array('controller' => 'bands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Band'), array('controller' => 'bands', 'action' => 'add')); ?> </li>
	</ul>
</div>
