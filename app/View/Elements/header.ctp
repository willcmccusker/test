
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
								<!-- <img class='lazyimg' src='/img/empty.png' data-src='/file-manager/userfiles/_thumbs/flags/<?=$city["City"]["flag_path"];?>'> -->
							</div> 
							<div class='popup-city-region'><?=$city["Region"]["name"];?></div>
						</a>
					</li>
				<?endforeach;?>
				</ul>
			</div>
		</div>
	</div>
</div>