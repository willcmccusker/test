<div class="regions form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Edit Region'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
				<?echo $this->Element("menu");?>

		<div class="col-md-9">
			<?php echo $this->Form->create('Region', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('abbreviation', array('class' => 'form-control', 'placeholder' => 'Abbreviation'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Slug'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data_set_id', array('class' => 'form-control', 'placeholder' => 'Data Set Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('city_count', array('class' => 'form-control', 'placeholder' => 'City Count'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
