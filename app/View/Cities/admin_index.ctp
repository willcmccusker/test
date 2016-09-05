<div class="cities index">
	<h2><?php echo __('Cities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('population'); ?></th>
			<th><?php echo $this->Paginator->sort('region_id'); ?></th>
			<th><?php echo $this->Paginator->sort('g_d_p_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_size_id'); ?></th>
			<th><?php echo $this->Paginator->sort('photo_path'); ?></th>
<!-- 			<th><?php echo $this->Paginator->sort('created'); ?></th>
 -->			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cities as $city): ?>
	<tr>
		<td><?php echo h($city['City']['name']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['country']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['population']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($city['Region']['name'], array('controller' => 'regions', 'action' => 'view', $city['Region']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($city['GDP']['name'], array('controller' => 'g_d_ps', 'action' => 'view', $city['GDP']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($city['CitySize']['name'], array('controller' => 'city_sizes', 'action' => 'view', $city['CitySize']['id'])); ?>
		</td>
		<td>
			<img class='admin-photo' src='/photos/<?php echo $city['City']['photo_path']; ?>'>
		</td>
		
<!-- 		<td><?php echo $this->Time->niceShort($city['City']['created']); ?>&nbsp;</td>
 -->		<td><?php echo $this->Time->niceShort($city['City']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $city['City']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $city['City']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $city['City']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $city['City']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('Import Data'), array('controller'=>'cities', 'action' => 'import')); ?></li>
		<li><?php echo $this->Html->link(__('New City'), array('action' => 'add')); ?></li>
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
