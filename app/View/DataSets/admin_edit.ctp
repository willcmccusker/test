<div class="dataSets form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Edit Data Set'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<?echo $this->Element("menu");?>

		<div class="col-md-9">
			<?php echo $this->Form->create('DataSet', array('role' => 'form')); ?>
	<?php echo $this->Form->create('DataSet', array('role' => 'form')); ?>
	<?php echo $this->Form->input('id');?>
<?foreach($fields as $field=>$bs):?>
				<div class="form-group">
					<?php echo $this->Form->input($field, array('class' => 'form-control', 'placeholder' => Inflector::humanize($field)));?>
				</div>
<? endforeach;?>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
