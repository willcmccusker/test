<div class='grid'>
<div class='col-1-3 mob-1-1'>
	<h1>	<?= $this->Html->link("The Atlas of Urban Expansion", array("controller"=>"/"));?></h1>
</div>
<div class='col-1-3 mob-1-1'>
	<?= $this->Html->link("Cities", array("controller"=>"cities", "action"=>"index"));?>
	<?= $this->Html->link("About", array("controller"=>"about"));?>
	<?= $this->Html->link("Data", array("controller"=>"data"));?>

</div>
<div class='col-1-3 mob-1-1'>
	<input type='search'>
</div>