<div class="dataSets view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Data Set'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

				<?echo $this->Element("menu");?>


		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>

				<?
	foreach($validate as $k=>$val):
		// debug($k);
		?>
<tr>
		<th><? echo Inflector::humanize($k); ?></th>
		<td>
			<?php echo h($dataSet['DataSet'][$k]); ?>
			&nbsp;
		</td>
</tr>

	<?endforeach;

?>
		
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
			<td><?php echo $city['areas_and_densities_p_d_f_path']; ?></td>
			<td><?php echo $city['areas_and_densities_g_i_s_path']; ?></td>
			<td><?php echo $city['blocks_and_roads_p_d_f_path']; ?></td>
			<td><?php echo $city['blocks_and_roads_g_i_s_path']; ?></td>
			<td><?php echo $city['historical_data_p_d_f_path']; ?></td>
			<td><?php echo $city['historical_data_g_i_s_path']; ?></td>
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
