<div class="dataSets view">
<h2><?php echo __('Data Set'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Density Change T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['density_change_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Density Change T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['density_change_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fragmentation T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['fragmentation_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fragmentation T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['fragmentation_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Population Growth T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['population_growth_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Population Growth T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['population_growth_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urban Expansion A T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['urban_expansion_a_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urban Expansion A T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['urban_expansion_a_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Average Block Size T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['average_block_size_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Average Block Size T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['average_block_size_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gridded T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['gridded_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gridded T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['gridded_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Roads And Boulevards T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['roads_and_boulevards_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Roads And Boulevards T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['roads_and_boulevards_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Residential Planned Before Development T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['residential_planned_before_development_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Residential Planned Before Development T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['residential_planned_before_development_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Streets Less Than 4m T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['streets_less_than_4m_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Streets Less Than 4m T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['streets_less_than_4m_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Walking Distance Of Arterial Road T1 T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t1_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Walking Distance Of Arterial Road T2 T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t2_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suburban Built Up T1'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['suburban_built_up_t1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suburban Built Up T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['suburban_built_up_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suburban Built Up T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['suburban_built_up_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urban Built Up T1'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['urban_built_up_t1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urban Built Up T2'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['urban_built_up_t2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urban Built Up T3'); ?></dt>
		<dd>
			<?php echo h($dataSet['DataSet']['urban_built_up_t3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->niceShort($dataSet['DataSet']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Data Set'), array('action' => 'edit', $dataSet['DataSet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Data Set'), array('action' => 'delete', $dataSet['DataSet']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dataSet['DataSet']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Sets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Set'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Cities'); ?></h3>
	<?php if (!empty($dataSet['City'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Cityid'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Population'); ?></th>
		<th><?php echo __('Photo Path'); ?></th>
		<th><?php echo __('P D F Path'); ?></th>
		<th><?php echo __('G I S Path'); ?></th>
		<th><?php echo __('World Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th><?php echo __('G D P Id'); ?></th>
		<th><?php echo __('City Size Id'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('Urban Extent T1 Path'); ?></th>
		<th><?php echo __('Urban Extent T2 Path'); ?></th>
		<th><?php echo __('Urban Extent T3 Path'); ?></th>
		<th><?php echo __('Urban Layout Arterial Roads Path'); ?></th>
		<th><?php echo __('Urban Layout Medians Path'); ?></th>
		<th><?php echo __('Urban Layout Locales Path'); ?></th>
		<th><?php echo __('Urban Layout Blocks Path'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataSet['City'] as $city): ?>
		<tr>
			<td><?php echo $city['id']; ?></td>
			<td><?php echo $city['name']; ?></td>
			<td><?php echo $city['cityid']; ?></td>
			<td><?php echo $city['slug']; ?></td>
			<td><?php echo $city['country']; ?></td>
			<td><?php echo $city['latitude']; ?></td>
			<td><?php echo $city['longitude']; ?></td>
			<td><?php echo $city['population']; ?></td>
			<td><?php echo $city['photo_path']; ?></td>
			<td><?php echo $city['p_d_f_path']; ?></td>
			<td><?php echo $city['g_i_s_path']; ?></td>
			<td><?php echo $city['world_id']; ?></td>
			<td><?php echo $city['region_id']; ?></td>
			<td><?php echo $city['g_d_p_id']; ?></td>
			<td><?php echo $city['city_size_id']; ?></td>
			<td><?php echo $city['data_set_id']; ?></td>
			<td><?php echo $city['urban_extent_t1_path']; ?></td>
			<td><?php echo $city['urban_extent_t2_path']; ?></td>
			<td><?php echo $city['urban_extent_t3_path']; ?></td>
			<td><?php echo $city['urban_layout_arterial_roads_path']; ?></td>
			<td><?php echo $city['urban_layout_medians_path']; ?></td>
			<td><?php echo $city['urban_layout_locales_path']; ?></td>
			<td><?php echo $city['urban_layout_blocks_path']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related City Sizes'); ?></h3>
	<?php if (!empty($dataSet['CitySize'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('City Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataSet['CitySize'] as $citySize): ?>
		<tr>
			<td><?php echo $citySize['id']; ?></td>
			<td><?php echo $citySize['name']; ?></td>
			<td><?php echo $citySize['number']; ?></td>
			<td><?php echo $citySize['slug']; ?></td>
			<td><?php echo $citySize['data_set_id']; ?></td>
			<td><?php echo $citySize['city_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'city_sizes', 'action' => 'view', $citySize['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'city_sizes', 'action' => 'edit', $citySize['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'city_sizes', 'action' => 'delete', $citySize['id']), array('confirm' => __('Are you sure you want to delete # %s?', $citySize['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New City Size'), array('controller' => 'city_sizes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related G D Ps'); ?></h3>
	<?php if (!empty($dataSet['GDP'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('City Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataSet['GDP'] as $gDP): ?>
		<tr>
			<td><?php echo $gDP['id']; ?></td>
			<td><?php echo $gDP['name']; ?></td>
			<td><?php echo $gDP['slug']; ?></td>
			<td><?php echo $gDP['data_set_id']; ?></td>
			<td><?php echo $gDP['city_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'g_d_ps', 'action' => 'view', $gDP['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'g_d_ps', 'action' => 'edit', $gDP['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'g_d_ps', 'action' => 'delete', $gDP['id']), array('confirm' => __('Are you sure you want to delete # %s?', $gDP['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New G D P'), array('controller' => 'g_d_ps', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Regions'); ?></h3>
	<?php if (!empty($dataSet['Region'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Abbreviation'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('City Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataSet['Region'] as $region): ?>
		<tr>
			<td><?php echo $region['id']; ?></td>
			<td><?php echo $region['name']; ?></td>
			<td><?php echo $region['abbreviation']; ?></td>
			<td><?php echo $region['slug']; ?></td>
			<td><?php echo $region['data_set_id']; ?></td>
			<td><?php echo $region['city_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'regions', 'action' => 'view', $region['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'regions', 'action' => 'edit', $region['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'regions', 'action' => 'delete', $region['id']), array('confirm' => __('Are you sure you want to delete # %s?', $region['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Worlds'); ?></h3>
	<?php if (!empty($dataSet['World'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataSet['World'] as $world): ?>
		<tr>
			<td><?php echo $world['id']; ?></td>
			<td><?php echo $world['year']; ?></td>
			<td><?php echo $world['data_set_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'worlds', 'action' => 'view', $world['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'worlds', 'action' => 'edit', $world['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'worlds', 'action' => 'delete', $world['id']), array('confirm' => __('Are you sure you want to delete # %s?', $world['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New World'), array('controller' => 'worlds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
