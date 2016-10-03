<div class="texts form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Add Text'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
				<?echo $this->Element("menu");?>

		<div class="col-md-9">
			<?php echo $this->Form->create('Text', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('content', array('class' => 'summernote display-none', 'placeholder' => 'Content'));?>
					<div id='summernote'></div>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default', 'formnovalidate ')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
