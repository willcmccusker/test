<div class='grid header'>
	<div class='col-1-3 mob-1-1'>
		<h1 id="site-title"><?= $this->Html->link("The Atlas of Urban Expansion", array("controller"=>"/"));?></h1>
	</div>
	<div class='col-1-3 mob-1-1 headerMenu'>
		<ul>
		<li><?= $this->Html->link("Cities", array("controller"=>"cities", "action"=>"index"));?></li>
		<li><?= $this->Html->link("About", array("controller"=>"about"));?></li>
		<li><?= $this->Html->link("Data", array("controller"=>"data"));?></li>
		</ul>
	</div>
	<div class='col-1-3 mob-1-1 align-right'>
		<div class="searchbox">
			<div>
				<input type="search" id="search" placeholder="Search..." />
			</div>
		</div>
	</div>
</div>