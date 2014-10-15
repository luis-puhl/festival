<div class="bands form">
<?php echo $this->Form->create('Band'); ?>
	<fieldset>
		<legend><?php echo __('Edit Band'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('style');
		echo $this->Form->input('payment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Band.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Band.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bands'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
