<div class="dataSets index">
	<h2><?php echo __('Data Sets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('density_change_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('density_change_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('fragmentation_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('fragmentation_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('population_growth_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('population_growth_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('urban_expansion_a_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('urban_expansion_a_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('average_block_size_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('average_block_size_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('gridded_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('gridded_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('roads_and_boulevards_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('roads_and_boulevards_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('residential_planned_before_development_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('residential_planned_before_development_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('streets_less_than_4m_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('streets_less_than_4m_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('walking_distance_of_arterial_road_t1_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('walking_distance_of_arterial_road_t2_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('suburban_built_up_t1'); ?></th>
			<th><?php echo $this->Paginator->sort('suburban_built_up_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('suburban_built_up_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('urban_built_up_t1'); ?></th>
			<th><?php echo $this->Paginator->sort('urban_built_up_t2'); ?></th>
			<th><?php echo $this->Paginator->sort('urban_built_up_t3'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dataSets as $dataSet): ?>
	<tr>
		<td><?php echo h($dataSet['DataSet']['id']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['density_change_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['density_change_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['fragmentation_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['fragmentation_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['population_growth_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['population_growth_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['urban_expansion_a_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['urban_expansion_a_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['average_block_size_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['average_block_size_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['gridded_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['gridded_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['roads_and_boulevards_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['roads_and_boulevards_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['residential_planned_before_development_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['residential_planned_before_development_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['streets_less_than_4m_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['streets_less_than_4m_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t1_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t2_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['suburban_built_up_t1']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['suburban_built_up_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['suburban_built_up_t3']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['urban_built_up_t1']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['urban_built_up_t2']); ?>&nbsp;</td>
		<td><?php echo h($dataSet['DataSet']['urban_built_up_t3']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($dataSet['DataSet']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dataSet['DataSet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dataSet['DataSet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dataSet['DataSet']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dataSet['DataSet']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Data Set'), array('action' => 'add')); ?></li>
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
