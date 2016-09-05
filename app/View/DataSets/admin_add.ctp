<div class="dataSets form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Add Data Set'); ?></h1>
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

																<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Data Sets'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Cities'), array('controller' => 'cities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List City Sizes'), array('controller' => 'city_sizes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New City Size'), array('controller' => 'city_sizes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List G D Ps'), array('controller' => 'g_d_ps', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New G D P'), array('controller' => 'g_d_ps', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Regions'), array('controller' => 'regions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Region'), array('controller' => 'regions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Worlds'), array('controller' => 'worlds', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New World'), array('controller' => 'worlds', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('DataSet', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('density_change_t1_t2', array('class' => 'form-control', 'placeholder' => 'Density Change T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_change_t2_t3', array('class' => 'form-control', 'placeholder' => 'Density Change T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fragmentation_t1_t2', array('class' => 'form-control', 'placeholder' => 'Fragmentation T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fragmentation_t2_t3', array('class' => 'form-control', 'placeholder' => 'Fragmentation T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('population_growth_t1_t2', array('class' => 'form-control', 'placeholder' => 'Population Growth T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('population_growth_t2_t3', array('class' => 'form-control', 'placeholder' => 'Population Growth T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_expansion_a_t1_t2', array('class' => 'form-control', 'placeholder' => 'Urban Expansion A T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_expansion_a_t2_t3', array('class' => 'form-control', 'placeholder' => 'Urban Expansion A T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('average_block_size_t1_t2', array('class' => 'form-control', 'placeholder' => 'Average Block Size T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('average_block_size_t2_t3', array('class' => 'form-control', 'placeholder' => 'Average Block Size T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('gridded_t1_t2', array('class' => 'form-control', 'placeholder' => 'Gridded T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('gridded_t2_t3', array('class' => 'form-control', 'placeholder' => 'Gridded T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_and_boulevards_t1_t2', array('class' => 'form-control', 'placeholder' => 'Roads And Boulevards T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_and_boulevards_t2_t3', array('class' => 'form-control', 'placeholder' => 'Roads And Boulevards T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('residential_planned_before_development_t1_t2', array('class' => 'form-control', 'placeholder' => 'Residential Planned Before Development T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('residential_planned_before_development_t2_t3', array('class' => 'form-control', 'placeholder' => 'Residential Planned Before Development T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('streets_less_than_4m_t1_t2', array('class' => 'form-control', 'placeholder' => 'Streets Less Than 4m T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('streets_less_than_4m_t2_t3', array('class' => 'form-control', 'placeholder' => 'Streets Less Than 4m T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('walking_distance_of_arterial_road_t1_t2', array('class' => 'form-control', 'placeholder' => 'Walking Distance Of Arterial Road T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('walking_distance_of_arterial_road_t2_t3', array('class' => 'form-control', 'placeholder' => 'Walking Distance Of Arterial Road T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('suburban_built_up_t1', array('class' => 'form-control', 'placeholder' => 'Suburban Built Up T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('suburban_built_up_t2', array('class' => 'form-control', 'placeholder' => 'Suburban Built Up T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('suburban_built_up_t3', array('class' => 'form-control', 'placeholder' => 'Suburban Built Up T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_built_up_t1', array('class' => 'form-control', 'placeholder' => 'Urban Built Up T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_built_up_t2', array('class' => 'form-control', 'placeholder' => 'Urban Built Up T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_built_up_t3', array('class' => 'form-control', 'placeholder' => 'Urban Built Up T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
