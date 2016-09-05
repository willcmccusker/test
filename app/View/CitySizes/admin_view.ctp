<div class="citySizes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('City Size'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit City Size'), array('action' => 'edit', $citySize['CitySize']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete City Size'), array('action' => 'delete', $citySize['CitySize']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $citySize['CitySize']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List City Sizes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New City Size'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Data Sets'), array('controller' => 'data_sets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Data Set'), array('controller' => 'data_sets', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Cities'), array('controller' => 'cities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($citySize['CitySize']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($citySize['CitySize']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Number'); ?></th>
		<td>
			<?php echo h($citySize['CitySize']['number']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Slug'); ?></th>
		<td>
			<?php echo h($citySize['CitySize']['slug']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Set'); ?></th>
		<td>
			<?php echo $this->Html->link($citySize['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $citySize['DataSet']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('City Count'); ?></th>
		<td>
			<?php echo h($citySize['CitySize']['city_count']); ?>
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
	<?php if (!empty($citySize['City'])): ?>
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
	<?php foreach ($citySize['City'] as $city): ?>
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
