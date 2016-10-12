<header class='header'>
	<div id='site-title'>
		<h1 id="site-title">
			<?= $this->Html->link("Atlas of Urban Expansion", array("controller"=>"/"));?>
		</h1>
	</div>
	<nav class='menu-icon'>
		<div class='nav-holder'>
			<?= $this->Html->link("Cities", array("controller"=>"cities", "action"=>"index"));?>
			<?= $this->Html->link("Data", array("controller"=>"data"));?>
			<?= $this->Html->link("Historical Data", array("controller"=>"historical-data"));?>
			<?= $this->Html->link("About", array("controller"=>"about"));?>
		</div>
	</nav>
	<div id='citySearch' class='unlisted menu-icon'>
		<div class='closeHolder'>
			<div class='closeCitySearch'></div>
		</div>
		<input class="search" id="search" placeholder="Search..." />
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