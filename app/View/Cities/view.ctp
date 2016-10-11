<script>
	var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
</script>
<div class='cityHeader lazyimg' data-src='/file-manager/userfiles/photos/<?= $city['City']['photo_path'];?>' style="background-image: url(/file-manager/userfiles/_med/photos/<?= $city['City']['photo_path'];?>); ">
	<img src="/file-manager/userfiles/_med/photos/<?= $city['City']['photo_path'];?>" style="width:1px; height:1px; opacity:0; position:absolute;">
	<div class='grid wide'>
		<div class='col-1-1 mob-1-1'>
			<div class='h1'><?= $city["City"]["name"];?></div>
			<div class="countryNameRow">
				<div class='flag'>
					<?= $this->Html->image("/file-manager/userfiles/flags/".str_replace(".png", ".jpg", $city["City"]["flag_path"]));?>
				</div>
				<div class="countryName">
					<?= $city["City"]["country"];?>
				</div>
			</div>
			<div class='citySummaryTable'>
				<div class="statLabel">
					<div class="table-label">Region</div>
				</div>
				<div class='statValue'>
					<div><?= $city["Region"]["name"];?></div>
				</div>
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
					<div><?= number_format($city["City"]["extent"]);?> hectares</div>
				</div>
				<div class='statLabel'>
					<div class="table-label"><?= substr($city["City"]["t3"], 0,4);?> Density</div>
				</div>
				<div class='statValue'>
					<div><?= $city["City"]["density"];?> persons/hectare</div>
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
	<div class='grid wide'>
		<div class='col-1-1'>
			<div class='sectionHeader'>Areas and Densities</div>
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
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='population_change_bar' class='city-graphic' data-unit="%" data-title="Avg. Annual % Change" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
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
				<ul>
					<li> <label><input class="layerToggle" type="checkbox" name="urban"/> urban </label>
					<li> <label><input class="layerToggle" type="checkbox" name="suburban"/> suburban </label>
					<li> <label><input class="layerToggle" type="checkbox" name="rural"/> rural </label>
					<li> <label><input class="layerToggle" type="checkbox" name="openSpace"/> openSpace </label>
				</ul>
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='urban_extent_t1_map' class='city-map'>
				</div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='urban_extent_composition_stacked_bar' class='city-graphic'  data-title="Urban Composition" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='urban_extent_change_bar' class='city-graphic'  data-title="Avg. Annual % Change" height="350px"></canvas>
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
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='density_built_up_change_bar' class='city-graphic' data-title="Built-up Area Avg. Annual % Change" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>				
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='density_urban_extent_line' class='city-graphic' data-title='Urban Extent Density (Persons/Hectare)' data-unit=" Persons/Hectare" height="350px"></canvas>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='density_urban_extent_change_bar' class='city-graphic'   data-title='Urban Extent Avg. Annual % Change' height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
					<div id="composition_of_added_area" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Composition of Added Area</h3>
				<p><?= $dynamicTexts["composition_of_added_area"]["Text"]["content"];?></p>
				</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='composition_t1_t2_map' class='city-map'></div>
			</div>
		</div>
	</div>
		<div class='grid wide'>
			<div class='col-1-1'>
				<div class='sectionHeader'>Blocks and Roads</div>
			</div>
		</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<div id="roads" class='anchorPoint'></div>
				<h3 class='sectionSubHeader' >Roads</h3>
				<p><?= $dynamicTexts["density"]["Text"]["content"];?></p>
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='roads_map' class='city-map'></div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='roads_in_built_up_area_bar' class='city-graphic'  data-multiply="100" data-title='Share of built up area occupied by roads and boulevards'  data-unit="%"" data-multiply="100" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>

			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='roads_average_width_bar' class='city-graphic' data-title='Average Street Width' height="350px"  data-unit="m" ></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>		
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='roads_width_stacked_bar' class='city-graphic'  data-title='Street Width Composition' height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
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
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='arterial_map' class='city-map'></div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad'>
					<canvas id='arterial_roads_density_bar' class='city-graphic' data-title='Density of Arterial Roads (km/km2)' data-unit=" km/km2" height="350px"></canvas>
					<div class='years' >
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 — 2015</span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
			<div class='position-relative col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='arterial_roads_walking_bar' class='city-graphic' data-title='Share of Area Within Walking Distance of Arterial Roads' data-unit="%" data-multiply="100" height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 — 2015</span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'></div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad'>
					<canvas id='arterial_roads_beeline_bar' data-unit="m" class='city-graphic' data-title='Beeline Distance to Arterial Roads' height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 — 2015</span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
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
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='blocks_map' class='city-map'></div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad'>
					<canvas id='blocks_and_plots_composition_special_stacked' class='city-graphic' data-title='Share of Residential Land Use Settlements' height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 — 2015</span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad'>
					<canvas id='blocks_plots_average_block_bar' class='city-graphic' data-title='Average Block Size (hectares)' data-unit=' hectares' height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
		</div>
		<div class='grid wide'>
		<div class='col-1-5 tab-1-1'></div>
		<div class='col-2-5 tab-1-2 mob-1-1'>
			<div class='col-3-4 mob-1-1 no-pad'>
				<canvas id='blocks_plots_average_bar' class='city-graphic' data-title='Average Plot Size (m&sup2;)' data-unit=' m&sup2;' height="350px"></canvas>
			</div>
			<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
		</div>
		<div class='col-2-5 tab-1-2 mob-1-1'>

		</div>
		</div>
	</div>
</div>
<? //debug($city);?>