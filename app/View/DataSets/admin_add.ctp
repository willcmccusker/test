<div class="dataSets form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Add Data Set'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
				<?echo $this->Element("menu");?>

		<div class="col-md-9">
			<?php echo $this->Form->create('DataSet', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('population_t1', array('class' => 'form-control', 'placeholder' => 'Population T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('population_t2', array('class' => 'form-control', 'placeholder' => 'Population T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('population_t3', array('class' => 'form-control', 'placeholder' => 'Population T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('population_change_t1_t2', array('class' => 'form-control', 'placeholder' => 'Population Change T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('population_change_t2_t3', array('class' => 'form-control', 'placeholder' => 'Population Change T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_urban_t1', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Urban T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_urban_t2', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Urban T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_urban_t3', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Urban T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_suburban_t1', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Suburban T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_suburban_t2', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Suburban T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_suburban_t3', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Suburban T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_rural_t1', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Rural T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_rural_t2', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Rural T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_rural_t3', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Rural T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_open_t1', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Open T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_open_t2', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Open T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_composition_open_t3', array('class' => 'form-control', 'placeholder' => 'Urban Extent Composition Open T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_change_t1_t2', array('class' => 'form-control', 'placeholder' => 'Urban Extent Change T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('urban_extent_change_t2_t3', array('class' => 'form-control', 'placeholder' => 'Urban Extent Change T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_built_up_t1', array('class' => 'form-control', 'placeholder' => 'Density Built Up T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_built_up_t2', array('class' => 'form-control', 'placeholder' => 'Density Built Up T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_built_up_t3', array('class' => 'form-control', 'placeholder' => 'Density Built Up T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_built_up_change_t1_t2', array('class' => 'form-control', 'placeholder' => 'Density Built Up Change T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_built_up_change_t2_t3', array('class' => 'form-control', 'placeholder' => 'Density Built Up Change T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_urban_extent_t1', array('class' => 'form-control', 'placeholder' => 'Density Urban Extent T1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_urban_extent_t2', array('class' => 'form-control', 'placeholder' => 'Density Urban Extent T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_urban_extent_t3', array('class' => 'form-control', 'placeholder' => 'Density Urban Extent T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_urban_extent_change_t1_t2', array('class' => 'form-control', 'placeholder' => 'Density Urban Extent Change T1 T2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('density_urban_extent_change_t2_t3', array('class' => 'form-control', 'placeholder' => 'Density Urban Extent Change T2 T3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_in_built_up_area_pre_1990', array('class' => 'form-control', 'placeholder' => 'Roads In Built Up Area Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_in_built_up_area_1990_2015', array('class' => 'form-control', 'placeholder' => 'Roads In Built Up Area 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_average_width_pre_1990', array('class' => 'form-control', 'placeholder' => 'Roads Average Width Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_average_width_1990_2015', array('class' => 'form-control', 'placeholder' => 'Roads Average Width 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_under_4m_pre_1990', array('class' => 'form-control', 'placeholder' => 'Roads Width Under 4m Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_under_4m_1990_2015', array('class' => 'form-control', 'placeholder' => 'Roads Width Under 4m 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_4_8m_pre_1990', array('class' => 'form-control', 'placeholder' => 'Roads Width 4 8m Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_4_8m_1990_2015', array('class' => 'form-control', 'placeholder' => 'Roads Width 4 8m 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_8_12m_pre_1990', array('class' => 'form-control', 'placeholder' => 'Roads Width 8 12m Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_8_12m_1990_2015', array('class' => 'form-control', 'placeholder' => 'Roads Width 8 12m 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_12_16m_pre_1990', array('class' => 'form-control', 'placeholder' => 'Roads Width 12 16m Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_12_16m_1990_2015', array('class' => 'form-control', 'placeholder' => 'Roads Width 12 16m 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_over_16m_pre_1990', array('class' => 'form-control', 'placeholder' => 'Roads Width Over 16m Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roads_width_over_16m_1990_2015', array('class' => 'form-control', 'placeholder' => 'Roads Width Over 16m 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_density_all_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Density All Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_density_all_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Density All 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_density_wide_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Density Wide Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_density_wide_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Density Wide 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_density_narrow_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Density Narrow Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_density_narrow_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Density Narrow 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_walking_all_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Walking All Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_walking_all_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Walking All 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_walking_wide_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Walking Wide Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_walking_wide_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Walking Wide 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_walking_narrow_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Walking Narrow Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_walking_narrow_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Walking Narrow 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_beeline_all_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Beeline All Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_beeline_all_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Beeline All 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_beeline_wide_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Beeline Wide Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_beeline_wide_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Beeline Wide 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_beeline_narrow_pre_1990', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Beeline Narrow Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('arterial_roads_beeline_narrow_1990_2015', array('class' => 'form-control', 'placeholder' => 'Arterial Roads Beeline Narrow 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_plots_average_block_pre_1990', array('class' => 'form-control', 'placeholder' => 'Blocks Plots Average Block Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_plots_average_block_1990_2015', array('class' => 'form-control', 'placeholder' => 'Blocks Plots Average Block 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_plots_average_informal_plot_pre_1990', array('class' => 'form-control', 'placeholder' => 'Blocks Plots Average Informal Plot Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_plots_average_informal_plot_1990_2015', array('class' => 'form-control', 'placeholder' => 'Blocks Plots Average Informal Plot 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_plots_average_formal_plot_pre_1990', array('class' => 'form-control', 'placeholder' => 'Blocks Plots Average Formal Plot Pre 1990'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocks_plots_average_formal_plot_1990_2015', array('class' => 'form-control', 'placeholder' => 'Blocks Plots Average Formal Plot 1990 2015'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
