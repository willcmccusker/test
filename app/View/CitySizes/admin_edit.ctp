<div class="citySizes form">
<?php echo $this->Form->create('CitySize'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit City Size'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('number');
		echo $this->Form->input('slug');
		echo $this->Form->input('data_set_id');
		echo $this->Form->input('city_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CitySize.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CitySize.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List City Sizes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Data Sets'), array('controller' => 'data_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Set'), array('controller' => 'data_sets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
