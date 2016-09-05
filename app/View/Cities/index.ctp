<? $this->assign('title', "Cities");?>

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