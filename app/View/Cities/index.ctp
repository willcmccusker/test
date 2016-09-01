<div id='cityList'>

	<input class="search" placeholder="Search" />

	<button class="sort" data-sort="city">
		Sort by city
	</button>  

	<button class="sort" data-sort="region">
		Sort by region
	</button>
	
	<ul class='list'>

<?foreach($cities as $i=>$city):?>

	<li class='<?=$city["Region"]["slug"];?>'>
		<h3 class='region '><?=$city["Region"]["name"];?></h3>
		<div class='city'>
			<a href='/cities/view/<?=$city["City"]["slug"];?>'>
				<?=$city["City"]["name"];?> — <?=$city["City"]["country"];?>
			</a>
		</div>
	</li>

<?endforeach;?>

	</ul>
	
</div>