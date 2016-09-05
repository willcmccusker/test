<div class="dataSets view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Data Set'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Data Set'), array('action' => 'edit', $dataSet['DataSet']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Data Set'), array('action' => 'delete', $dataSet['DataSet']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $dataSet['DataSet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Data Sets'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Data Set'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Cities'), array('controller' => 'cities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List City Sizes'), array('controller' => 'city_sizes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New City Size'), array('controller' => 'city_sizes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New G D P'), array('controller' => 'g_d_ps', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Regions'), array('controller' => 'regions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Region'), array('controller' => 'regions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Worlds'), array('controller' => 'worlds', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New World'), array('controller' => 'worlds', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Change T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_change_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Change T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_change_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fragmentation T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['fragmentation_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fragmentation T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['fragmentation_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Population Growth T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['population_growth_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Population Growth T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['population_growth_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Expansion A T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_expansion_a_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Expansion A T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_expansion_a_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Average Block Size T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['average_block_size_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Average Block Size T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['average_block_size_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Gridded T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['gridded_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Gridded T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['gridded_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads And Boulevards T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_and_boulevards_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads And Boulevards T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_and_boulevards_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Residential Planned Before Development T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['residential_planned_before_development_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Residential Planned Before Development T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['residential_planned_before_development_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Streets Less Than 4m T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['streets_less_than_4m_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Streets Less Than 4m T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['streets_less_than_4m_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Walking Distance Of Arterial Road T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Walking Distance Of Arterial Road T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Suburban Built Up T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['suburban_built_up_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Suburban Built Up T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['suburban_built_up_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Suburban Built Up T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['suburban_built_up_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Built Up T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_built_up_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Built Up T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_built_up_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Built Up T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_built_up_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['created']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Cities'); ?></h3>
	<?php if (!empty($dataSet['City'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
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
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
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
			<td><?php echo $city['created']; ?></td>
			<td><?php echo $city['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'cities', 'action' => 'view', $city['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'cities', 'action' => 'edit', $city['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'cities', 'action' => 'delete', $city['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $city['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related City Sizes'); ?></h3>
	<?php if (!empty($dataSet['CitySize'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('City Count'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($dataSet['CitySize'] as $citySize): ?>
		<tr>
			<td><?php echo $citySize['id']; ?></td>
			<td><?php echo $citySize['name']; ?></td>
			<td><?php echo $citySize['number']; ?></td>
			<td><?php echo $citySize['slug']; ?></td>
			<td><?php echo $citySize['data_set_id']; ?></td>
			<td><?php echo $citySize['city_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'city_sizes', 'action' => 'view', $citySize['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'city_sizes', 'action' => 'edit', $citySize['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'city_sizes', 'action' => 'delete', $citySize['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $citySize['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New City Size'), array('controller' => 'city_sizes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related G D Ps'); ?></h3>
	<?php if (!empty($dataSet['GDP'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('City Count'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($dataSet['GDP'] as $gDP): ?>
		<tr>
			<td><?php echo $gDP['id']; ?></td>
			<td><?php echo $gDP['name']; ?></td>
			<td><?php echo $gDP['slug']; ?></td>
			<td><?php echo $gDP['data_set_id']; ?></td>
			<td><?php echo $gDP['city_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'g_d_ps', 'action' => 'view', $gDP['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'g_d_ps', 'action' => 'edit', $gDP['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'g_d_ps', 'action' => 'delete', $gDP['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $gDP['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New G D P'), array('controller' => 'g_d_ps', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Regions'); ?></h3>
	<?php if (!empty($dataSet['Region'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Abbreviation'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th><?php echo __('City Count'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($dataSet['Region'] as $region): ?>
		<tr>
			<td><?php echo $region['id']; ?></td>
			<td><?php echo $region['name']; ?></td>
			<td><?php echo $region['abbreviation']; ?></td>
			<td><?php echo $region['slug']; ?></td>
			<td><?php echo $region['data_set_id']; ?></td>
			<td><?php echo $region['city_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'regions', 'action' => 'view', $region['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'regions', 'action' => 'edit', $region['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'regions', 'action' => 'delete', $region['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $region['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Region'), array('controller' => 'regions', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Worlds'); ?></h3>
	<?php if (!empty($dataSet['World'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($dataSet['World'] as $world): ?>
		<tr>
			<td><?php echo $world['id']; ?></td>
			<td><?php echo $world['year']; ?></td>
			<td><?php echo $world['data_set_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'worlds', 'action' => 'view', $world['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'worlds', 'action' => 'edit', $world['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'worlds', 'action' => 'delete', $world['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $world['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New World'), array('controller' => 'worlds', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
