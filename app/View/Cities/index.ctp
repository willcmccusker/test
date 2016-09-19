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

		<?$i = 0;$region = false;foreach($cities as $city):if($region != $city["Region"]["name"]){$i++;$region = $city["Region"]["name"];}?>

			<li class='region-<?=$i;?>'>
				<h3 class='region '><?=$region;?></h3>
				<div class='city'>
					<a href='/cities/view/<?=$city["City"]["slug"];?>'>
						<?=$city["City"]["name"];?> — <?=$city["City"]["country"];?>
					</a>
				</div>
			</li>

		<?endforeach;?>

			</ul>

		</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
	example usage of grid, col element.
	col-1-2  = 1/2 width 
	mob-1-1 = full width but only on mobile
	tab-1-2 = half width on tablet

	</div>
	<div class='col-1-2 mob-1-1'>
	yaaaaaaaay
	</div>
</div>