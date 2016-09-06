<div class="regions index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Regions'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Region'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List '.__('Data Sets'), array('controller' => 'data_sets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New '.__('Data Set'), array('controller' => 'data_sets', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List '.__('Cities'), array('controller' => 'cities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New '.__('City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false)); ?> </li>
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
						<th nowrap><?php echo $this->Paginator->sort('name'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('abbreviation'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('slug'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('data_set_id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('city_count'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($regions as $region): ?>
					<tr>
						<td nowrap><?php echo h($region['Region']['id']); ?>&nbsp;</td>
						<td nowrap><?php echo h($region['Region']['name']); ?>&nbsp;</td>
						<td nowrap><?php echo h($region['Region']['abbreviation']); ?>&nbsp;</td>
						<td nowrap><?php echo h($region['Region']['slug']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($region['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $region['DataSet']['id'])); ?>
		</td>
						<td nowrap><?php echo h($region['Region']['city_count']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $region['Region']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $region['Region']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $region['Region']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $region['Region']['id'])); ?>
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