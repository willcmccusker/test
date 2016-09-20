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
		<th><?php echo __('Population T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['population_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Population T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['population_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Population T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['population_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Population Change T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['population_change_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Population Change T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['population_change_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Urban T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_urban_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Urban T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_urban_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Urban T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_urban_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Suburban T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_suburban_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Suburban T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_suburban_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Suburban T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_suburban_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Rural T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_rural_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Rural T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_rural_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Rural T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_rural_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Open T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_open_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Open T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_open_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Composition Open T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_composition_open_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Change T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_change_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent Change T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['urban_extent_change_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Built Up T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_built_up_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Built Up T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_built_up_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Built Up T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_built_up_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Built Up Change T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_built_up_change_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Built Up Change T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_built_up_change_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Urban Extent T1'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_urban_extent_t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Urban Extent T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_urban_extent_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Urban Extent T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_urban_extent_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Urban Extent Change T1 T2'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_urban_extent_change_t1_t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density Urban Extent Change T2 T3'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['density_urban_extent_change_t2_t3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads In Built Up Area Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_in_built_up_area_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads In Built Up Area 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_in_built_up_area_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Average Width Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_average_width_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Average Width 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_average_width_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width Under 4m Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_under_4m_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width Under 4m 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_under_4m_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width 4 8m Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_4_8m_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width 4 8m 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_4_8m_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width 8 12m Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_8_12m_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width 8 12m 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_8_12m_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width 12 16m Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_12_16m_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width 12 16m 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_12_16m_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width Over 16m Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_over_16m_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roads Width Over 16m 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['roads_width_over_16m_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Density All Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_density_all_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Density All 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_density_all_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Density Wide Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_density_wide_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Density Wide 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_density_wide_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Density Narrow Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_density_narrow_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Density Narrow 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_density_narrow_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Walking All Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_walking_all_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Walking All 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_walking_all_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Walking Wide Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_walking_wide_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Walking Wide 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_walking_wide_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Walking Narrow Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_walking_narrow_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Walking Narrow 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_walking_narrow_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Beeline All Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_beeline_all_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Beeline All 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_beeline_all_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Beeline Wide Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_beeline_wide_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Beeline Wide 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_beeline_wide_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Beeline Narrow Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_beeline_narrow_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Arterial Roads Beeline Narrow 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['arterial_roads_beeline_narrow_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Blocks Plots Average Block Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['blocks_plots_average_block_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Blocks Plots Average Block 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['blocks_plots_average_block_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Blocks Plots Average Informal Plot Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['blocks_plots_average_informal_plot_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Blocks Plots Average Informal Plot 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['blocks_plots_average_informal_plot_1990_2015']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Blocks Plots Average Formal Plot Pre 1990'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['blocks_plots_average_formal_plot_pre_1990']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Blocks Plots Average Formal Plot 1990 2015'); ?></th>
		<td>
			<?php echo h($dataSet['DataSet']['blocks_plots_average_formal_plot_1990_2015']); ?>
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
		<th><?php echo __('Extent'); ?></th>
		<th><?php echo __('Density'); ?></th>
		<th><?php echo __('T1'); ?></th>
		<th><?php echo __('T2'); ?></th>
		<th><?php echo __('T3'); ?></th>
		<th><?php echo __('Photo Path'); ?></th>
		<th><?php echo __('Flag Path'); ?></th>
		<th><?php echo __('P D F Path'); ?></th>
		<th><?php echo __('G I S Path'); ?></th>
		<th><?php echo __('World Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th><?php echo __('G D P Id'); ?></th>
		<th><?php echo __('City Size Id'); ?></th>
		<th><?php echo __('Data Set Id'); ?></th>
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
			<td><?php echo $city['extent']; ?></td>
			<td><?php echo $city['density']; ?></td>
			<td><?php echo $city['t1']; ?></td>
			<td><?php echo $city['t2']; ?></td>
			<td><?php echo $city['t3']; ?></td>
			<td><?php echo $city['photo_path']; ?></td>
			<td><?php echo $city['flag_path']; ?></td>
			<td><?php echo $city['p_d_f_path']; ?></td>
			<td><?php echo $city['g_i_s_path']; ?></td>
			<td><?php echo $city['world_id']; ?></td>
			<td><?php echo $city['region_id']; ?></td>
			<td><?php echo $city['g_d_p_id']; ?></td>
			<td><?php echo $city['city_size_id']; ?></td>
			<td><?php echo $city['data_set_id']; ?></td>
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
