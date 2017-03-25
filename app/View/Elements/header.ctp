<header class='header'>
	<div id='site-title'>
		<h1 id="site-title">
			<a href="/">Atlas of Urban Expansion</a>
		</h1>
	</div>
	<nav class='menu-icon'>
		<div class='nav-holder'>
			<a href="/cities">Cities</a>
			<a href="/data">Data</a>
			<a href="/historical-data">30 Historical Cities</a>
			<a href="/about">About</a>
		</div>
	</nav>
	<div id='citySearch' class='unlisted menu-icon'>
		<div class='closeHolder'>
			<div class='closeCitySearch'></div>
		</div>
		<div class="search-container">
		<input class="search" id="search" placeholder="Search" />
		</div>
		<ul class='list'>
		<?foreach($cities as $i=>$city):?>
			<li>
				<a href='/cities/view/<?=$city["City"]["slug"];?>'>
					<div class='display-none popup-city-country'><?= $city["City"]["country"];?></div>
					<div class='popup-city-li'>
						<div class='popup-city-city'><?= $city["City"]["name"];?></div>
						<img class='lazyimg' src='/img/empty.png' data-src='/file-manager/userfiles/_thumbs/flags/<?= str_replace(".png", ".jpg", $city["City"]["flag_path"]);?>'>
					</div> 
					<div class='popup-city-region'><?=$city["Region"]["name"];?></div>
				</a>
			</li>
		<?endforeach;?>
		</ul>
	</div>
</header>