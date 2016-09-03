<div class="gDPs view">
<h2><?php echo __('G D P'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gDP['GDP']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($gDP['GDP']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($gDP['GDP']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Set'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gDP['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $gDP['DataSet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Count'); ?></dt>
		<dd>
			<?php echo h($gDP['GDP']['city_count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit G D P'), array('action' => 'edit', $gDP['GDP']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete G D P'), array('action' => 'delete', $gDP['GDP']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $gDP['GDP']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List G D Ps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New G D P'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Sets'), array('controller' => 'data_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Set'), array('controller' => 'data_sets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cities'); ?></h3>
	<?php if (!empty($gDP['City'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
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
	<?php foreach ($gDP['City'] as $city): ?>
		<tr>
			<td><?php echo $city['id']; ?></td>
			<td><?php echo $city['name']; ?></td>
			<td><?php echo $city['slug']; ?></td>
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
			<td><?php echo $this->Time->niceShort($city['created']); ?></td>
			<td><?php echo $this->Time->niceShort($city['modified']); ?></td>
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
