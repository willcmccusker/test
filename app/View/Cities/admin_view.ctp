<div class="cities view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('City'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit City'), array('action' => 'edit', $city['City']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete City'), array('action' => 'delete', $city['City']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Cities'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New City'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Worlds'), array('controller' => 'worlds', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New World'), array('controller' => 'worlds', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Regions'), array('controller' => 'regions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Region'), array('controller' => 'regions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New G D P'), array('controller' => 'g_d_ps', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List City Sizes'), array('controller' => 'city_sizes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New City Size'), array('controller' => 'city_sizes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Data Sets'), array('controller' => 'data_sets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Data Set'), array('controller' => 'data_sets', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($city['City']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cityid'); ?></th>
		<td>
			<?php echo h($city['City']['cityid']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Slug'); ?></th>
		<td>
			<?php echo h($city['City']['slug']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Country'); ?></th>
		<td>
			<?php echo h($city['City']['country']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Latitude'); ?></th>
		<td>
			<?php echo h($city['City']['latitude']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Longitude'); ?></th>
		<td>
			<?php echo h($city['City']['longitude']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Population'); ?></th>
		<td>
			<?php echo h($city['City']['population']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Photo Path'); ?></th>
		<td>
			<?php echo h($city['City']['photo_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('P D F Path'); ?></th>
		<td>
			<?php echo h($city['City']['p_d_f_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('G I S Path'); ?></th>
		<td>
			<?php echo h($city['City']['g_i_s_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('World'); ?></th>
		<td>
			<?php echo $this->Html->link($city['World']['year'], array('controller' => 'worlds', 'action' => 'view', $city['World']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Region'); ?></th>
		<td>
			<?php echo $this->Html->link($city['Region']['name'], array('controller' => 'regions', 'action' => 'view', $city['Region']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('G D P'); ?></th>
		<td>
			<?php echo $this->Html->link($city['GDP']['name'], array('controller' => 'g_d_ps', 'action' => 'view', $city['GDP']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('City Size'); ?></th>
		<td>
			<?php echo $this->Html->link($city['CitySize']['name'], array('controller' => 'city_sizes', 'action' => 'view', $city['CitySize']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Set'); ?></th>
		<td>
			<?php echo $this->Html->link($city['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $city['DataSet']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent T1 Path'); ?></th>
		<td>
			<?php echo h($city['City']['urban_extent_t1_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent T2 Path'); ?></th>
		<td>
			<?php echo h($city['City']['urban_extent_t2_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Extent T3 Path'); ?></th>
		<td>
			<?php echo h($city['City']['urban_extent_t3_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Layout Arterial Roads Path'); ?></th>
		<td>
			<?php echo h($city['City']['urban_layout_arterial_roads_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Layout Medians Path'); ?></th>
		<td>
			<?php echo h($city['City']['urban_layout_medians_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Layout Locales Path'); ?></th>
		<td>
			<?php echo h($city['City']['urban_layout_locales_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Urban Layout Blocks Path'); ?></th>
		<td>
			<?php echo h($city['City']['urban_layout_blocks_path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($city['City']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo $this->Time->niceShort($city['City']['modified']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

