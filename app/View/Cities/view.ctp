<script>
	var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
</script>
<div class='cityHeader'>
<img class='loader' src="/file-manager/userfiles/_med/photos/<?= $city['City']['photo_path'];?>" >
<div class='header-bg lazyimg' data-src='/file-manager/userfiles/photos/<?= $city['City']['photo_path'];?>' style="background-image: url('/file-manager/userfiles/_med/photos/<?= $city['City']['photo_path'];?>'); "></div>
	<div class='grid wide'>
		<div class='col-1-1 mob-1-1'>
			<div class='h1'><?= $city["City"]["name"];?></div>
			<div class='cityRegionTable'>
				<div class="countryNameRow">
					<div class='flag'>
						<?= $this->Html->image("/file-manager/userfiles/flags/".str_replace(".png", ".jpg", $city["City"]["flag_path"]));?>
					</div>
					<div class="countryName">
						<?= $city["City"]["country"];?>
					</div>
				</div>
				<div class="regionMenu">Region: <?= $city["Region"]["name"];?></div>
			</div>
			<div class='citySummaryTable'>
				<div class='statLabel'>
					<div class="statLabel"><?= substr($city["City"]["t3"], 0,4);?> Population</div>
				</div>
				<div class='statValue'>
					<div><?= number_format($city["City"]["population"]);?></div>
				</div>
				<div class='statLabel'>
					<div class="table-label"><?= substr($city["City"]["t3"], 0,4);?> Urban Extent</div>
				</div>
				<div class='statValue'>
					<div><?= number_format($city["City"]["extent"]);?><div class="units">hectares</div></div>
				</div>
				<div class='statLabel'>
					<div class="table-label"><?= substr($city["City"]["t3"], 0,4);?> Density</div>
				</div>
				<div class='statValue'>
					<div><?= number_format($city["City"]["density"], 0);?><div class="units">persons/hectare</div></div>
				</div>
			</div>
		</div>
	</div>
	<div class='grid cityNav wide'>
		<div class='col-1-1'>
			<ul>
			<div class="cityNavHeader">Areas and Densities</div>
				<li><?= $this->Html->link("Population", "#population", array("class"=>"navJump"));?></li>
				<li><?= $this->Html->link("Urban Extent", "#urban_extent", array("class"=>"navJump"));?></li>
				<li><?= $this->Html->link("Density", "#density", array("class"=>"navJump"));?></li>
				<li><?= $this->Html->link("Composition of Added Area", "#composition_of_added_area", array("class"=>"navJump"));?></li>
			</ul>
			<ul>
			<div class="cityNavHeader">Blocks and Roads</div>
				<li><?= $this->Html->link("Roads", "#roads", array("class"=>"navJump"));?></li>
				<li><?= $this->Html->link("Arterial Roads", "#arterial_roads", array("class"=>"navJump"));?></li>
				<li><?= $this->Html->link("Blocks and Plots", "#blocks_and_plots", array("class"=>"navJump"));?></li>
			</ul>
		</div>
	</div>
</div>
<div class='graphMainContainer'>
	<div class='grid wide '>
		<div class='col-1-1 header-underline no-pad'>
			<div class='col-1-2 tab-1-1 mob-1-1'>
				<div class='sectionHeader'>Areas and Densities</div>
			</div>
			<div class='col-1-2 tab-1-1 mob-1-1'>
				<div class='sectionDownload'>Download:
					<a download target="_blank" href="/file-manager/userfiles/data_page/Areas_and_Densities_Table/Areas and Densities Table 1.csv">CSV</a> 
					<a download target="_blank" href="/file-manager/userfiles/data_page/Areas_and_Densities_Table/Areas and Densities Table 1.xlsx">XLSX</a> 
				</div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="population" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Population</h3>
				<p>
					<? //debug($dynamicTexts);?>
					<?= $dynamicTexts["population"]["Text"]["content"];?>
				</p>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='population_line' class='city-graphic no-legend'  data-title="Population"  height="350px" data-unit=""></canvas>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='population_change_bar' class='city-graphic' data-unit="%" data-title="Population Avg. Annual % Change" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="urban_extent" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Urban Extent</h3>
				<p>
					<?= $dynamicTexts["urban_extent"]["Text"]["content"];?>
				</p>
				<ul class='map-legend-years'>
					<li> <label class='current-year'><input class="periodToggle extent" type="radio" name="extentPeriod" value="t1" checked="checked" data-target="extent"/> <?= substr($city["City"]["t1"], 0, 4);?> </label>
					<li> <label><input class="periodToggle extent" type="radio" name="extentPeriod" value="t2" data-target="extent" /> <?= substr($city["City"]["t2"], 0, 4);?> </label>
					<li> <label><input class="periodToggle extent" type="radio" name="extentPeriod" value="t3" data-target="extent" /> <?= substr($city["City"]["t3"], 0, 4);?> </label>
				</ul>
				<ul class='map-legend-sections'>
					<li> <label><input class="layerToggle extent" type="checkbox" data-target="extent" checked="checked" name="urbanBuilt"/> <span></span>Urban Built-up </label>
					<li> <label><input class="layerToggle extent" type="checkbox" data-target="extent" checked="checked" name="suburbanBuilt"/> <span></span>Suburban Built-up </label>
					<li> <label><input class="layerToggle extent" type="checkbox" data-target="extent" checked="checked" name="ruralBuilt "/> <span></span>Rural Built-up </label>
					<li> <label><input class="layerToggle extent" type="checkbox" data-target="extent" checked="checked" name="urbanOpen"/> <span></span>Urbanized Open Space </label>
					<li> <label><input class="layerToggle extent" type="checkbox" data-target="extent" checked="checked" name="exurbanBuilt"/> <span></span>Exurban Built-Up Area </label>
					<li> <label><input class="layerToggle extent" type="checkbox" data-target="extent" checked="checked" name="exurbanOpen"/> <span></span>Exurban Open Space </label>
					<li> <label><input class="layerToggle extent" type="checkbox" data-target="extent" checked="checked" name="exurbanRural"/> <span></span>Urban Edge </label>
				</ul>
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>

				<div id='urban_extent_t1_map' class='city-map'>
				<div class='mobile-map-cover'></div>
					<script>
						var extent;
						var urban_extent_t1_map = function(){
							allMaps.extent = L.mapbox.map('urban_extent_t1_map', 'mapbox.light', {
								center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
								zoom: 11,
								maxZoom : 13,
								reuseTiles : true,
								scrollWheelZoom : false
							});

							allMaps.extent_t1_outline = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/urban_edge_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_urbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/urban_build_up_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_suburbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/suburban_build_up_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_ruralBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/rural_build_up_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_urbanOpen = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/open_space_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_exurbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_built_up_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_exurbanOpen = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_open_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_exurbanRural = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_rural_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t1_water = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/water_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});

							allMaps.extent_t2_outline = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/urban_extent/urban_edge_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_urbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/urban_build_up_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_suburbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/suburban_build_up_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_ruralBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/rural_build_up_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_urbanOpen = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/open_space_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_exurbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_built_up_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_exurbanOpen = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_open_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_exurbanRural = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_rural_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t2_water = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/water_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});

							allMaps.extent_t3_outline = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/urban_extent/urban_edge_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_urbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/urban_build_up_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_suburbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/suburban_build_up_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_ruralBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/rural_build_up_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_urbanOpen = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/open_space_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_exurbanBuilt = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_built_up_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_exurbanOpen = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_open_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_exurbanRural = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/exurban_rural_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
							allMaps.extent_t3_water = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/urban_extent/water_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});

							allMaps.extent_t1_layer = L.layerGroup([
								allMaps.extent_t1_outline, 
								allMaps.extent_t1_urbanBuilt, 
								allMaps.extent_t1_suburbanBuilt, 
								allMaps.extent_t1_ruralBuilt, 
								allMaps.extent_t1_urbanOpen, 
								allMaps.extent_t1_exurbanBuilt, 
								allMaps.extent_t1_exurbanOpen, 
								allMaps.extent_t1_exurbanRural, 
								allMaps.extent_t1_water]).addTo(allMaps.extent);
							allMaps.extent_t2_layer = L.layerGroup([
								allMaps.extent_t2_outline, 
								allMaps.extent_t2_urbanBuilt, 
								allMaps.extent_t2_suburbanBuilt, 
								allMaps.extent_t2_ruralBuilt, 
								allMaps.extent_t2_urbanOpen, 
								allMaps.extent_t2_exurbanBuilt, 
								allMaps.extent_t2_exurbanOpen, 
								allMaps.extent_t2_exurbanRural, 
								allMaps.extent_t2_water]);
							allMaps.extent_t3_layer = L.layerGroup([
								allMaps.extent_t3_outline, 
								allMaps.extent_t3_urbanBuilt, 
								allMaps.extent_t3_suburbanBuilt, 
								allMaps.extent_t3_ruralBuilt, 
								allMaps.extent_t3_urbanOpen, 
								allMaps.extent_t3_exurbanBuilt, 
								allMaps.extent_t3_exurbanOpen, 
								allMaps.extent_t3_exurbanRural, 
								allMaps.extent_t3_water]);

							allMaps.extentStyle = L.mapbox.styleLayer('mapbox://styles/willcmccusker/citydnrig00682io4flsusb20').addTo(allMaps.extent);
						}
					</script>
				</div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='urban_extent_composition_stacked_bar' class='city-graphic'  data-title="Urban Composition" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='urban_extent_change_bar' class='city-graphic'  data-title="Urban Extent Avg. Annual % Change" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
		</div>

	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="density" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Density</h3>
				<p>
					<?= $dynamicTexts["density"]["Text"]["content"];?>
				</p>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='density_built_up_line' class='city-graphic' data-title='Built-up Area Density (Persons/Hectare)' data-unit=" Persons/Hectare" height="350px"></canvas>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='density_built_up_change_bar' class='city-graphic' data-title="Built-up Area Avg. Annual % Change" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>				

			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='density_urban_extent_line' class='city-graphic' data-title='Urban Extent Density (Persons/Hectare)' data-unit=" Persons/Hectare" height="350px"></canvas>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='density_urban_extent_change_bar' class='city-graphic'   data-title='Urban Extent Avg. Annual % Change' height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="composition_of_added_area" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Composition of Added Area</h3>
				<p><?= $dynamicTexts["composition_of_added_area"]["Text"]["content"];?></p>
				<ul  class='map-legend-years'>

					<li> <label class=" current-year"><input class="periodToggle addedArea" type="radio" name="addedPeriod" value="t1" checked="checked" data-target="addedArea"/> <?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?> </label>
					<li> <label><input class="periodToggle addedArea" type="radio" name="addedPeriod" value="t2" data-target="addedArea" /> <?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?> </label>
				</ul>
				<ul  class='map-legend-sections'>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="builtUp" data-target="addedArea"/> <span></span> Built-up area </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="infill" data-target="addedArea"/> <span></span> Infill </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="extension" data-target="addedArea"/> <span></span> Extension </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="leapfrog" data-target="addedArea"/> <span></span> Leapfog </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="inclusion" data-target="addedArea"/> <span></span> Inclusion </label>
				</ul>
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='composition_of_added_area_map' class='city-map'></div>
				<div class='mobile-map-cover'></div>
			</div>
			<script>
			var addedArea;
			var composition_of_added_area_map = function(){
					allMaps.addedArea = L.mapbox.map('composition_of_added_area_map', 'mapbox.light', {
						center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
						zoom: 11,
						maxZoom : 13,
						scrollWheelZoom : false,
						reuseTiles : true,
					});
				L.Util.emptyImageUrl = "/img/search.png";



				allMaps.addedArea_t1_outline = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/urban_edge_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
				allMaps.addedArea_t1_builtUp = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/built_up_area_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t1_infill = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/infill_t1_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t1_extension = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/extension_t1_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t1_leapfrog = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/leapfrog_t1_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t1_inclusion = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/inclusion_t1_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				
				allMaps.addedArea_t2_outline = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/urban_edge_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t2_builtUp = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/built_up_area_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t2_infill = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/infill_t2_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t2_extension = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/extension_t2_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t2_leapfrog = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/leapfrog_t2_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });
				allMaps.addedArea_t2_inclusion = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/inclusion_t2_t3/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc" });


					allMaps.addedArea_t1_layer = L.layerGroup([
						allMaps.addedArea_t1_outline, 
						allMaps.addedArea_t1_builtUp, 
						allMaps.addedArea_t1_infill, 
						allMaps.addedArea_t1_extension, 
						allMaps.addedArea_t1_leapfrog, 
						allMaps.addedArea_t1_inclusion]).addTo(allMaps.addedArea);
					allMaps.addedArea_t2_layer = L.layerGroup([
						allMaps.addedArea_t2_outline, 
						allMaps.addedArea_t2_builtUp, 
						allMaps.addedArea_t2_infill, 
						allMaps.addedArea_t2_extension, 
						allMaps.addedArea_t2_leapfrog, 
						allMaps.addedArea_t2_inclusion]);


					allMaps.addedAreatyle = L.mapbox.styleLayer('mapbox://styles/willcmccusker/citydnrig00682io4flsusb20').addTo(allMaps.addedArea);
			}
		</script>
		</div>
	</div>
		<div class='grid wide'>
			<div class='col-1-1 header-underline no-pad'>
				<div class='col-1-2 tab-1-1 mob-1-1'>
					<div class='sectionHeader'>Blocks and Roads</div>
				</div>
				<div class='col-1-2 tab-1-1 mob-1-1'>
					<div class='sectionDownload'>Download:
						<a download target="_blank" href="/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks and Roads Table 1.csv">CSV</a> 
						<a download target="_blank" href="/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks and Roads Table 1.xlsx">XLSX</a> 
					</div>
				</div>
			</div>
		</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="roads" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Roads</h3>
				<p><?= $dynamicTexts["density"]["Text"]["content"];?></p>
				<ul  class='map-legend-years'>
					<li> <label class=" current-year"><input class="periodToggle roads" type="radio" name="roadsPeriod" value="t1" checked="checked" data-target="roads"/><?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?></label>
					<li> <label><input class="periodToggle roads" type="radio" name="roadsPeriod" value="t2" data-target="roads" /><?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?></label>
				</ul>
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='roads_map' class='city-map'></div>
				<div class='mobile-map-cover'></div>

				<script>
				var roads_map = function(){

					allMaps.roads = L.mapbox.map('roads_map', 'mapbox.satellite', {
						center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
						zoom: 15,

								// maxZoom : 13,
								reuseTiles : true,
						scrollWheelZoom : false
					});

					allMaps.t1_outline = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/urban_edge_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"}).addTo(allMaps.roads)
					allMaps.t1_roads = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/roads/roads_t0/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
					allMaps.t1_locales = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/roads/locales_t0/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});

					allMaps.t2_roads = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/roads/roads_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
					allMaps.t2_locales = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/roads/locales_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"})

					allMaps.roads_t1_layer = L.layerGroup([
						allMaps.t1_roads, 
						allMaps.t1_locales]).addTo(allMaps.roads);
					allMaps.roads_t2_layer = L.layerGroup([
						allMaps.t2_roads, 
						allMaps.t2_locales]);
				}
				</script>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='roads_in_built_up_area_bar' class='city-graphic'  data-multiply="100" data-title='Share of built up area occupied by roads and boulevards'  data-unit="%"" data-multiply="100" height="350px"></canvas>

				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>

			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='roads_average_width_bar' class='city-graphic' data-title='Average Street Width' height="350px"  data-unit="m" ></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>		

		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='roads_width_stacked_bar' class='city-graphic'  data-title='Street Width Composition' height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>
			<div class='col-2-5 tab-1-1 mob-1-1'></div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="arterial_roads" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Arterial Roads</h3>
				
				<p><?= $dynamicTexts["arterial_roads"]["Text"]["content"];?></p>
				<ul  class='map-legend-years'>
					<li> <label class=" current-year"><input class="periodToggle arterials" type="radio" name="arterialsPeriod" value="t1" checked="checked" data-target="arterials"/> <?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?> </label>
					<li> <label><input class="periodToggle arterials" type="radio" name="arterialsPeriod" value="t2" data-target="arterials" /> <?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?> </label>
				</ul>
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='arterial_map' class='city-map'></div>
				<div class='mobile-map-cover'></div>
				<script>
					var arterials;
					var arterial_map = function(){
					allMaps.arterials = L.mapbox.map('arterial_map', 'mapbox.satellite', {
							center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
							zoom: 12,

								// maxZoom : 13,
								reuseTiles : true,
							scrollWheelZoom : false
						});

					allMaps.arterialsLines = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/arterials/arterials_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"}).addTo(allMaps.arterials);
					allMaps.arterials_t1_layer = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/arterials/edge_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"}).addTo(allMaps.arterials);
					allMaps.arterials_t2_layer = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/arterials/edge_t2/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});
					}
				</script>

			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='arterial_roads_density_bar' class='city-graphic' data-title='Density of Arterial Roads (km/km2)' data-unit=" km/km2" height="350px"></canvas>
					<div class='years' >
						<span class='switchYear activeYear' data-year="1990"><?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?></span>&nbsp;
						<span class='switchYear' data-year="2015"><?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?></span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
			<div class='position-relative col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='arterial_roads_walking_bar' class='city-graphic' data-title='Share of Area Within Walking Distance of Arterial Roads' data-unit="%" data-multiply="100" height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990"><?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?></span>&nbsp;
						<span class='switchYear' data-year="2015"><?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?></span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'></div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='arterial_roads_beeline_bar' data-unit="m" class='city-graphic' data-title='Beeline Distance to Arterial Roads' height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990"><?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?></span>&nbsp;
						<span class='switchYear' data-year="2015"><?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?></span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'></div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="blocks_and_plots" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Blocks and Plots</h3>
				<p><?= $dynamicTexts["blocks_and_plots"]["Text"]["content"];?></p>
				<ul  class='map-legend-years'>
					<li> <label class=" current-year"><input class="periodToggle blocks" type="radio" name="blocksPeriod" value="t1" checked="checked" data-target="blocks"/> <?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?> </label>
					<li> <label><input class="periodToggle blocks" type="radio" name="blocksPeriod" value="t2" data-target="blocks" /> <?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?> </label>
				</ul>
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='blocks_map' class='city-map'></div>
				<div class='mobile-map-cover'></div>
				<script>
					var blocks_map = function(){
						allMaps.blocks = L.mapbox.map('blocks_map', 'mapbox.satellite', {
							center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
							zoom: 15,
							
								// maxZoom : 13,
								reuseTiles : true,
							scrollWheelZoom : false
						});

						allMaps.t1_outline = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/added_area/urban_edge_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"}).addTo(allMaps.blocks	)
						allMaps.t1_blocks = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/blocks/land_use_t0/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"});

						allMaps.t2_blocks = L.tileLayer('http://{s}.<? echo $_SERVER['HTTP_HOST'];?>/tiles/show/<?= $city['City']['slug'] ?>/blocks/land_use_t1/{z}/{x}/{y}.png', {tms: true,  subdomains : "abc"})

						allMaps.blocks_t1_layer = L.layerGroup([
							allMaps.t1_blocks]).addTo(allMaps.blocks);
						allMaps.blocks_t2_layer = L.layerGroup([
							allMaps.t2_blocks]);
					}
				</script>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad year-switch-graphic '>
					<canvas id='blocks_and_plots_composition_special_stacked' class='city-graphic' data-title='Share of Residential Land Use Settlements' height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990"><?= substr($city["City"]["t1"], 0, 4)."-".substr($city["City"]["t2"], 0, 4);?></span>&nbsp;
						<span class='switchYear' data-year="2015"><?= substr($city["City"]["t2"], 0, 4)."-".substr($city["City"]["t3"], 0, 4);?></span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='blocks_plots_average_block_bar' class='city-graphic' data-title='Average Block Size (hectares)' data-unit=' hectares' height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
		</div>
		<div class='grid wide'>
		<div class='col-1-5 tab-1-1'></div>
		<div class='col-2-5 tab-1-2 mob-1-1'>
			<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
				<canvas id='blocks_plots_average_bar' class='city-graphic' data-title='Average Plot Size (m&sup2;)' data-unit=' m&sup2;' height="350px"></canvas>
			</div>
			<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
		</div>
		<div class='col-2-5 tab-1-2 mob-1-1'>

		</div>
		</div>
	</div>
</div>
<script>
</script>
