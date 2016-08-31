<div class="cities view">
<h2><?php echo __('City'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($city['City']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($city['City']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($city['City']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($city['City']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Population'); ?></dt>
		<dd>
			<?php echo h($city['City']['population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urban Extent'); ?></dt>
		<dd>
			<?php echo h($city['City']['urban_extent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Density Built Up'); ?></dt>
		<dd>
			<?php echo h($city['City']['density_built_up']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['Photo']['path'], array('controller' => 'photos', 'action' => 'view', $city['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('World'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['World']['year'], array('controller' => 'worlds', 'action' => 'view', $city['World']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['Region']['name'], array('controller' => 'regions', 'action' => 'view', $city['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('G D P'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['GDP']['name'], array('controller' => 'g_d_ps', 'action' => 'view', $city['GDP']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Size'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['CitySize']['name'], array('controller' => 'city_sizes', 'action' => 'view', $city['CitySize']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Set'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $city['DataSet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($city['City']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($city['City']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit City'), array('action' => 'edit', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete City'), array('action' => 'delete', $city['City']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $city['City']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Worlds'), array('controller' => 'worlds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New World'), array('controller' => 'worlds', 'action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Downloads'); ?></h3>
	<?php if (!empty($city['Download'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($city['Download'] as $download): ?>
		<tr>
			<td><?php echo $download['id']; ?></td>
			<td><?php echo $download['type']; ?></td>
			<td><?php echo $download['path']; ?></td>
			<td><?php echo $download['city_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'downloads', 'action' => 'view', $download['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'downloads', 'action' => 'edit', $download['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'downloads', 'action' => 'delete', $download['id']), array('confirm' => __('Are you sure you want to delete # %s?', $download['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Download'), array('controller' => 'downloads', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
