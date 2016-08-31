<div class="regions view">
<h2><?php echo __('Region'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($region['Region']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($region['Region']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Set'); ?></dt>
		<dd>
			<?php echo $this->Html->link($region['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $region['DataSet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Count'); ?></dt>
		<dd>
			<?php echo h($region['Region']['city_count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Region'), array('action' => 'edit', $region['Region']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Region'), array('action' => 'delete', $region['Region']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $region['Region']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Sets'), array('controller' => 'data_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Set'), array('controller' => 'data_sets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cities'); ?></h3>
	<?php if (!empty($region['City'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Population'); ?></th>
		<th><?php echo __('Urban Extent'); ?></th>
		<th><?php echo __('Density Built Up'); ?></th>
		<th><?php echo __('Photo Id'); ?></th>
		<th><?php echo __('World Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th><?php echo __('G D P Id'); ?></th>
		<th><?php echo __('City Size Id'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($region['City'] as $city): ?>
		<tr>
			<td><?php echo $city['id']; ?></td>
			<td><?php echo $city['name']; ?></td>
			<td><?php echo $city['country']; ?></td>
			<td><?php echo $city['latitude']; ?></td>
			<td><?php echo $city['longitude']; ?></td>
			<td><?php echo $city['population']; ?></td>
			<td><?php echo $city['urban_extent']; ?></td>
			<td><?php echo $city['density_built_up']; ?></td>
			<td><?php echo $city['photo_id']; ?></td>
			<td><?php echo $city['world_id']; ?></td>
			<td><?php echo $city['region_id']; ?></td>
			<td><?php echo $city['g_d_p_id']; ?></td>
			<td><?php echo $city['city_size_id']; ?></td>
			<td><?php echo $city['data_set_id']; ?></td>
			<td><?php echo $city['created']; ?></td>
			<td><?php echo $city['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cities', 'action' => 'view', $city['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cities', 'action' => 'edit', $city['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cities', 'action' => 'delete', $city['id']), array('confirm' => __('Are you sure you want to delete # %s?', $city['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
