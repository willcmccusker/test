<div class="dataSets form">
<?php echo $this->Form->create('DataSet'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Data Set'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('density_change_t1_t2');
		echo $this->Form->input('density_change_t2_t3');
		echo $this->Form->input('fragmentation_t1_t2');
		echo $this->Form->input('fragmentation_t2_t3');
		echo $this->Form->input('population_growth_t1_t2');
		echo $this->Form->input('population_growth_t2_t3');
		echo $this->Form->input('urban_expansion_a_t1_t2');
		echo $this->Form->input('urban_expansion_a_t2_t3');
		echo $this->Form->input('average_block_size_t1_t2');
		echo $this->Form->input('average_block_size_t2_t3');
		echo $this->Form->input('gridded_t1_t2');
		echo $this->Form->input('gridded_t2_t3');
		echo $this->Form->input('roads_and_boulevards_t1_t2');
		echo $this->Form->input('roads_and_boulevards_t2_t3');
		echo $this->Form->input('residential_planned_before_development_t1_t2');
		echo $this->Form->input('residential_planned_before_development_t2_t3');
		echo $this->Form->input('streets_less_than_4m_t1_t2');
		echo $this->Form->input('streets_less_than_4m_t2_t3');
		echo $this->Form->input('walking_distance_of_arterial_road_t1_t2');
		echo $this->Form->input('walking_distance_of_arterial_road_t2_t3');
		echo $this->Form->input('suburban_built_up_t1');
		echo $this->Form->input('suburban_built_up_t2');
		echo $this->Form->input('suburban_built_up_t3');
		echo $this->Form->input('urban_built_up_t1');
		echo $this->Form->input('urban_built_up_t2');
		echo $this->Form->input('urban_built_up_t3');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DataSet.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('DataSet.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Data Sets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List City Sizes'), array('controller' => 'city_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City Size'), array('controller' => 'city_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New G D P'), array('controller' => 'g_d_ps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Worlds'), array('controller' => 'worlds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New World'), array('controller' => 'worlds', 'action' => 'add')); ?> </li>
	</ul>
</div>
