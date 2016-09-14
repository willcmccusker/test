<div class="cities index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Cities'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Import Cities and Data'), array('action' => 'import'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New City'), array('action' => 'add'), array('escape' => false)); ?></li>
								
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List '.__('Regions'), array('controller' => 'regions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New '.__('Region'), array('controller' => 'regions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List '.__('G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New '.__('G D P'), array('controller' => 'g_d_ps', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List '.__('City Sizes'), array('controller' => 'city_sizes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New '.__('City Size'), array('controller' => 'city_sizes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List '.__('Data Sets'), array('controller' => 'data_sets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New '.__('Data Set'), array('controller' => 'data_sets', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
<!-- 						<th nowrap><?php echo $this->Paginator->sort('id'); ?></th> -->
						<th nowrap><?php echo $this->Paginator->sort('name'); ?></th>
<!-- 						<th nowrap><?php echo $this->Paginator->sort('cityid'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('slug'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('country'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('latitude'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('longitude'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('population'); ?></th> -->
						<th nowrap><?php echo $this->Paginator->sort('photo_path'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('flag_path'); ?></th>
<!-- 						<th nowrap><?php echo $this->Paginator->sort('p_d_f_path'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('g_i_s_path'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('world_id'); ?></th> -->
						<th nowrap><?php echo $this->Paginator->sort('region_id'); ?></th>
<!-- 						<th nowrap><?php echo $this->Paginator->sort('g_d_p_id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('city_size_id'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('data_set_id'); ?></th> -->
<!-- 						<th nowrap><?php echo $this->Paginator->sort('created'); ?></th> -->
						<th nowrap><?php echo $this->Paginator->sort('modified'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($cities as $city): ?>
					<tr>
<!-- 						<td nowrap><?php echo h($city['City']['id']); ?>&nbsp;</td> -->
						<td nowrap><?php echo h($city['City']['name']); ?>&nbsp;</td>
<!-- 						<td nowrap><?php echo h($city['City']['cityid']); ?>&nbsp;</td> -->
<!-- 						<td nowrap><?php echo h($city['City']['slug']); ?>&nbsp;</td> -->
<!-- 						<td nowrap><?php echo h($city['City']['country']); ?>&nbsp;</td> -->
<!-- 						<td nowrap><?php echo h($city['City']['latitude']); ?>&nbsp;</td> -->
<!-- 						<td nowrap><?php echo h($city['City']['longitude']); ?>&nbsp;</td> -->
<!-- 						<td nowrap><?php echo h($city['City']['population']); ?>&nbsp;</td> -->
						<td nowrap><?php 

						$thumb = "/file-manager/connectors/php/filemanager.php?path=%2Fphotos%2F".urlencode($city["City"]["photo_path"])."&mode=getimage&thumbnail=true&config=filemanager.config.json&time=".time();
						echo $this->Html->image($thumb); ?><br><?= $city['City']['photo_path'];?>&nbsp;</td>						
						<td nowrap><?php 

						$thumb = "/file-manager/connectors/php/filemanager.php?path=%2Fphotos%2F".urlencode($city["City"]["flag_path"])."&mode=getimage&thumbnail=true&config=filemanager.config.json&time=".time();
						echo $this->Html->image($thumb); ?><br><?= $city['City']['flag_path'];?>&nbsp;</td>
<!-- 						<td nowrap><?php echo h($city['City']['p_d_f_path']); ?>&nbsp;</td> -->
<!-- 						<td nowrap><?php echo h($city['City']['g_i_s_path']); ?>&nbsp;</td> -->
								<!-- <td>
			<?php echo $this->Html->link($city['World']['year'], array('controller' => 'worlds', 'action' => 'view', $city['World']['id'])); ?>
		</td> -->
								<td>
			<?php echo $this->Html->link($city['Region']['name'], array('controller' => 'regions', 'action' => 'view', $city['Region']['id'])); ?>
		</td>
<!-- 								<td>
			<?php echo $this->Html->link($city['GDP']['name'], array('controller' => 'g_d_ps', 'action' => 'view', $city['GDP']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($city['CitySize']['name'], array('controller' => 'city_sizes', 'action' => 'view', $city['CitySize']['id'])); ?>
		</td> -->
							<!-- 	<td>
			<?php echo $this->Html->link($city['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $city['DataSet']['id'])); ?>
		</td> -->
<!-- 						<td nowrap><?php echo h($city['City']['created']); ?>&nbsp;</td> -->
						<td nowrap><?php echo $this->Time->niceShort($city['City']['modified']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $city['City']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $city['City']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $city['City']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $city['City']['id'])); ?>
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