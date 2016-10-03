<div class="cities view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('City'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">
		<?echo $this->Element("menu");?>


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
		<th><?php echo __('Extent'); ?></th>
		<td>
			<?php echo h($city['City']['extent']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Density'); ?></th>
		<td>
			<?php echo h($city['City']['density']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('T1'); ?></th>
		<td>
			<?php echo h($city['City']['t1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('T2'); ?></th>
		<td>
			<?php echo h($city['City']['t2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('T3'); ?></th>
		<td>
			<?php echo h($city['City']['t3']); ?>
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
		<th><?php echo __('Flag Path'); ?></th>
		<td>
			<?php echo h($city['City']['flag_path']); ?>
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
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($city['City']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($city['City']['modified']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

