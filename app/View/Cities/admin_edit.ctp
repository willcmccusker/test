<div class="cities form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Edit City'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
				<?echo $this->Element("menu");?>

		<div class="col-md-9">
			<?php echo $this->Form->create('City', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
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
					<?php echo $this->Form->input('population', array('class' => 'form-control', 'placeholder' => 'Población'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('extent', array('class' => 'form-control', 'placeholder' => 'Extent'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density', array('class' => 'form-control', 'placeholder' => 'Density'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('t1', array('class' => 'form-control', 'placeholder' => 'T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('t2', array('class' => 'form-control', 'placeholder' => 'T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('t3', array('class' => 'form-control', 'placeholder' => 'T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('photo_path', array('class' => 'form-control', 'placeholder' => 'Photo Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('flag_path', array('class' => 'form-control', 'placeholder' => 'Flag Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('areas_and_densities_p_d_f_path', array('class' => 'form-control', 'placeholder' => 'Areas And Densities P D F Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('areas_and_densities_g_i_s_path', array('class' => 'form-control', 'placeholder' => 'Areas And Densities G I S Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_and_roads_p_d_f_path', array('class' => 'form-control', 'placeholder' => 'Blocks and Roads P D F Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_and_roads_g_i_s_path', array('class' => 'form-control', 'placeholder' => 'Blocks and Roads G I S Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('historical_data_p_d_f_path', array('class' => 'form-control', 'placeholder' => 'Historical Data P D F Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('historical_data_g_i_s_path', array('class' => 'form-control', 'placeholder' => 'Historical Data G I S Path'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('world_id', array('class' => 'form-control', 'placeholder' => 'World Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('region_id', array('class' => 'form-control', 'placeholder' => 'Region Id'));?>
				</div>
				<!-- <div class="form-group">
					<?php echo $this->Form->input('g_d_p_id', array('class' => 'form-control', 'placeholder' => 'G D P Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('city_size_id', array('class' => 'form-control', 'placeholder' => 'City Size Id'));?>
				</div> -->
				<div class="form-group">
					<?php echo $this->Form->input('data_set_id', array('class' => 'form-control', 'placeholder' => 'Data Set Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
