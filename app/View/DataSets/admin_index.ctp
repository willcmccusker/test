<div class="dataSets index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Data Sets'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Data Set'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Cities'), array('controller' => 'cities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('City Sizes'), array('controller' => 'city_sizes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('City Size'), array('controller' => 'city_sizes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('G D P'), array('controller' => 'g_d_ps', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Regions'), array('controller' => 'regions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Region'), array('controller' => 'regions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Worlds'), array('controller' => 'worlds', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('World'), array('controller' => 'worlds', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th nowrap><?php echo $this->Paginator->sort('id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('density_change_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('density_change_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('fragmentation_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('fragmentation_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('population_growth_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('population_growth_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('urban_expansion_a_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('urban_expansion_a_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('average_block_size_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('average_block_size_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('gridded_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('gridded_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('roads_and_boulevards_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('roads_and_boulevards_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('residential_planned_before_development_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('residential_planned_before_development_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('streets_less_than_4m_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('streets_less_than_4m_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('walking_distance_of_arterial_road_t1_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('walking_distance_of_arterial_road_t2_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('suburban_built_up_t1'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('suburban_built_up_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('suburban_built_up_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('urban_built_up_t1'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('urban_built_up_t2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('urban_built_up_t3'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('created'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($dataSets as $dataSet): ?>
					<tr>
						<td nowrap><?php echo h($dataSet['DataSet']['id']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['density_change_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['density_change_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['fragmentation_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['fragmentation_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['population_growth_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['population_growth_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['urban_expansion_a_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['urban_expansion_a_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['average_block_size_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['average_block_size_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['gridded_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['gridded_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['roads_and_boulevards_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['roads_and_boulevards_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['residential_planned_before_development_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['residential_planned_before_development_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['streets_less_than_4m_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['streets_less_than_4m_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t1_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['walking_distance_of_arterial_road_t2_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['suburban_built_up_t1']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['suburban_built_up_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['suburban_built_up_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['urban_built_up_t1']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['urban_built_up_t2']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['urban_built_up_t3']); ?>&nbsp;</td>
						<td nowrap><?php echo h($dataSet['DataSet']['created']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $dataSet['DataSet']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $dataSet['DataSet']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $dataSet['DataSet']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $dataSet['DataSet']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->