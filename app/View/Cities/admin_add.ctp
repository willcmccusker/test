<div class="cities form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Add City'); ?></h1>
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

																<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Cities'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Worlds'), array('controller' => 'worlds', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New World'), array('controller' => 'worlds', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Regions'), array('controller' => 'regions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Region'), array('controller' => 'regions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New G D P'), array('controller' => 'g_d_ps', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List City Sizes'), array('controller' => 'city_sizes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New City Size'), array('controller' => 'city_sizes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Data Sets'), array('controller' => 'data_sets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Data Set'), array('controller' => 'data_sets', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('City', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cityid', array('class' => 'form-control', 'placeholder' => 'Cityid'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Slug'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('country', array('class' => 'form-control', 'placeholder' => 'Country'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('latitude', array('class' => 'form-control', 'placeholder' => 'Latitude'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('longitude', array('class' => 'form-control', 'placeholder' => 'Longitude'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('population', array('class' => 'form-control', 'placeholder' => 'Population'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('photo_path', array('class' => 'form-control', 'placeholder' => 'Photo Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('p_d_f_path', array('class' => 'form-control', 'placeholder' => 'P D F Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('g_i_s_path', array('class' => 'form-control', 'placeholder' => 'G I S Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('world_id', array('class' => 'form-control', 'placeholder' => 'World Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('region_id', array('class' => 'form-control', 'placeholder' => 'Region Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('g_d_p_id', array('class' => 'form-control', 'placeholder' => 'G D P Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('city_size_id', array('class' => 'form-control', 'placeholder' => 'City Size Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data_set_id', array('class' => 'form-control', 'placeholder' => 'Data Set Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_t1_path', array('class' => 'form-control', 'placeholder' => 'Urban Extent T1 Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_t2_path', array('class' => 'form-control', 'placeholder' => 'Urban Extent T2 Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_t3_path', array('class' => 'form-control', 'placeholder' => 'Urban Extent T3 Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_layout_arterial_roads_path', array('class' => 'form-control', 'placeholder' => 'Urban Layout Arterial Roads Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_layout_medians_path', array('class' => 'form-control', 'placeholder' => 'Urban Layout Medians Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_layout_locales_path', array('class' => 'form-control', 'placeholder' => 'Urban Layout Locales Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_layout_blocks_path', array('class' => 'form-control', 'placeholder' => 'Urban Layout Blocks Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
