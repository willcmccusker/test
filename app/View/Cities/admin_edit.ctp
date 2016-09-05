<div class="cities form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit City'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('cityid');
		echo $this->Form->input('slug');
		echo $this->Form->input('country');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('population');
		echo $this->Form->input('photo_path');
		echo $this->Form->input('p_d_f_path');
		echo $this->Form->input('g_i_s_path');
		echo $this->Form->input('world_id');
		echo $this->Form->input('region_id');
		echo $this->Form->input('g_d_p_id');
		echo $this->Form->input('city_size_id');
		echo $this->Form->input('data_set_id');
		echo $this->Form->input('urban_extent_t1_path');
		echo $this->Form->input('urban_extent_t2_path');
		echo $this->Form->input('urban_extent_t3_path');
		echo $this->Form->input('urban_layout_arterial_roads_path');
		echo $this->Form->input('urban_layout_medians_path');
		echo $this->Form->input('urban_layout_locales_path');
		echo $this->Form->input('urban_layout_blocks_path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('City.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('City.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New G D P'), array('controller' => 'g_d_ps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List City Sizes'), array('controller' => 'city_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City Size'), array('controller' => 'city_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Sets'), array('controller' => 'data_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Set'), array('controller' => 'data_sets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Downloads'), array('controller' => 'downloads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Download'), array('controller' => 'downloads', 'action' => 'add')); ?> </li>
	</ul>
</div>
