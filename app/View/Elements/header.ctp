<div class='grid header-menu'>
	<div class='col-1-3 mob-1-1'>
		<div class='header'><?= $this->Html->link("The Atlas of Urban Expansion", array("controller"=>"/"));?></div>
	</div>
	<div class='col-1-3 mob-1-1 text-align-center'>
		<?= $this->Html->link("Cities", array("controller"=>"cities", "action"=>"index"));?>
		<?= $this->Html->link("About", array("controller"=>"about"));?>
		<?= $this->Html->link("Data", array("controller"=>"data"));?>
	</div>
	<div class='col-1-3 mob-1-1 text-align-right'>
		<input type='search'>
	</div>
</div>