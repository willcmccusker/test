<? $this->assign('title', "Cities");?>
<div class='grid'>
	<div class='col-1-1'>
		<div id='cityList'>

			<input class="search" placeholder="Search" />

		<!-- 	<button class="sort" data-sort="city">
				Sort by city
			</button>  

			<button class="sort" data-sort="region">
				Sort by region
			</button> -->
			<ul class='list'>
<!-- 			<div class='list grid'> -->
			<!-- <div class='col-1-3 tab-1-2 mob-1-1'> -->
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
<!-- 			</div> -->

		</div>
	</div>
</div>
