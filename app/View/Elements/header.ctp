
<div class='grid wide header'>
	<div class='col-1-3 mob-1-1'>
		<h1 id="site-title"><?= $this->Html->link("The Atlas of Urban Expansion", array("controller"=>"/"));?></h1>
	</div>
	<div class='col-1-3 mob-1-1 headerMenu center-align'>
		<ul>
		<li><?= $this->Html->link("Cities", array("controller"=>"cities", "action"=>"index"));?></li>
		<li><?= $this->Html->link("About", array("controller"=>"about"));?></li>
		<li><?= $this->Html->link("Data", array("controller"=>"data"));?></li>
		</ul>
	</div>
	<div class='col-1-3 mob-1-1 align-right'>
		<div class="searchbox">
			<div id='citySearch' class='unlisted'>
				<input class="search" type="search" id="search" placeholder="Search..." />
				<ul class='list'>
				<?$i = 0;
				$region = false;
				foreach($cities as $city):
					if($region != $city["Region"]["name"]){
						// echo $i == 2  || $i == 5 ? "</div>" : "";
						// echo $i == 2 ? "<div class='col-1-3 tab-1-2 mob-1-1'>" : ($i == 5 ? "<div class='col-1-3 tab-1-1 mob-1-1'>" : "");
						$i++;
						$region = $city["Region"]["name"];
					}?>

					<div class='region-<?=$i;?>'>
						<div class='display-none country'><?=$city["City"]["country"];?></div> 
						<h3 class='region '><?=$region;?></h3>
						<div class='city'>
							<a href='/cities/view/<?=$city["City"]["slug"];?>'>
								<?=$city["City"]["name"];?> — <?=$city["City"]["country"];?>
							</a>
						</div>
					</div>

				<?endforeach;?>
				</ul>
			</div>
		</div>
	</div>
</div>