<script>
	var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
</script>
<div class='cityHeader'>
	<div class='grid wide'>
		<div class='col-2-3 mob-1-1'>
			<div class='flag'><?= $this->Html->image("/file-manager/userfiles/flags/".$city["City"]["flag_path"]);?></div>
			<div class='h1'><?= $city["City"]["name"];?></div>
			<div class="countryName"><?= $city["City"]["country"];?></div>
			<div class="regionName"><?= $city["Region"]["name"];?></div>
		</div>
		<div class='col-1-3 mob-1-1'>
			<div class="cityImage">
			<!--<img src="/file-manager/userfiles/photos/<?= $city['City']['photo_path'];?>";>-->
			<img src="/file-manager/connectors/php/filemanager.php?path=%2Fphotos%2F<?= urlencode($city["City"]["photo_path"]);?>&mode=getimage&medium=true&config=filemanager.config.json&time=<?=time();?>">
			</div>
		</div>
	</div>
	<div class='grid wide'>
		<div class='col-1-1'>
			<table class='citySummaryTable'>
				<tr>
					<td class="table-label">Population</td>
					<td><?= $city["City"]["population"];?></td>
					<td colspan="1"></td>
				</tr>
				<tr>
					<td class="table-label">Urban Extent</td>
					<td><?= $city["City"]["extent"];?> hectares</td>
					<td colspan="1"></td>
				</tr>
					<td class="table-label">Density</td>
					<td><?= $city["City"]["density"];?> </td>
					<td colspan="1"></td>
				</tr>
			</table>
		</div>
	</div>
	<div class='grid cityNav wide'>
		<div class='col-3-3 mob-1-1'>
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
	<div class='section-header'>
		<div class='grid wide'>
			<div class='col-1-1'>
					<div class='sectionHeader'>Areas and Densities</div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<h3 class='sectionSubHeader' id="population">Population</h3>
				<p>This is a placeholder for dynamic descriptive text of the following graphics.</p>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='population_line' class='city-graphic' data-title="Population" height="200px"></canvas>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='population_change_bar' class='city-graphic' data-title="Avg. Annual % Change" height="200px"></canvas>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<h3 class='sectionSubHeader' id='urban_extent'>Urban Extent</h3>
				<p>This is a placeholder for dynamic descriptive text of the following graphics.</p>
			</div>
			<div class='col-4-5 mob-1-1'>
				<ul>
					<li> <label><input class="layerToggle" type="checkbox" name="urban"/> urban </label>
					<li> <label><input class="layerToggle" type="checkbox" name="suburban"/> suburban </label>
					<li> <label><input class="layerToggle" type="checkbox" name="rural"/> rural </label>
					<li> <label><input class="layerToggle" type="checkbox" name="openSpace"/> openSpace </label>
				</ul>

				<div id='urban_extent_t1_map' class='city-graphic' style="height:400px;">
					<script>
						L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og';
						var map = L.mapbox.map('urban_extent_t1_map', 'mapbox.light', {
							center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
							zoom: 11
						});
						var outline = L.tileLayer('/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_outline/{z}/{x}/{y}.png', {tms: true}).addTo(map);
						var urban = L.tileLayer('/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_urban/{z}/{x}/{y}.png', {tms: true});
						var suburban = L.tileLayer('/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_suburban/{z}/{x}/{y}.png', {tms: true});
						var rural = L.tileLayer('/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_rural/{z}/{x}/{y}.png', {tms: true});
						var openSpace = L.tileLayer('/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_open_space/{z}/{x}/{y}.png', {tms: true});

						$('.layerToggle').change(function() {
							var layer = eval($(this).prop('name'));
							if($(this).is(':checked')) {
								map.addLayer(layer);
							}else{
								map.removeLayer(layer);
							}
						});
					</script>
				</div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='urban_extent_composition_stacked_bar' class='city-graphic' data-title="Urban Composition"></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='urban_extent_change_bar' class='city-graphic' data-title="Avg. Annual % Change"></canvas>
			</div>
		</div>
		
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<h3 class='sectionSubHeader' id='density'>Density</h3>
				<p>This is a placeholder for dynamic descriptive text of the following graphics.</p>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='density_built_up_line' class='city-graphic' data-title='Built-up Area Density'></canvas>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='density_built_up_change_bar' class='city-graphic' data-title="Built-up Area Avg. Annual % Change"></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='density_urban_extent_line' class='city-graphic' data-title='Urban Extent Density'></canvas>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='density_urban_extent_change_bar' class='city-graphic' data-title='Urban Extent Avg. Annual % Change'></canvas>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<h3 class='sectionSubHeader' id='composition_of_added_area'>Composition of Added Area</h3>
				<p>This is a placeholder for dynamic descriptive text of the following graphics.</p>
				</div>
			<div class='col-4-5 mob-1-1'>
				<div id='composition_t1_t2_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
		</div>
	</div>
	<div class='section-header'>
		<div class='grid wide'>
			<div class='col-1-1'>
				<div class='sectionHeader'>Blocks and Roads</div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<h3 class='sectionSubHeader' id='roads'>Roads</h3>
				<p>This is a placeholder for dynamic descriptive text of the following graphics.</p>
			</div>
			<div class='col-4-5 mob-1-1'>
				<div id='roads_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='roads_in_built_up_area_bar' class='city-graphic' data-title='Share of built up area occupied by roads and boulevards'></canvas>
			</div>

			<div class='col-2-5 mob-1-1'>
				<canvas id='roads_average_width_bar' class='city-graphic' data-title='Average Street Width'></canvas>
			</div>		
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<canvas id='roads_width_stacked_bar' class='city-graphic', data-title='Street Width Composition'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'></div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<h3 class='sectionSubHeader' id='arterial_roads'>Arterial Roads</h3>
				<p>This is a placeholder for dynamic descriptive text of the following graphics.</p>
			</div>
			<div class='col-4-5 mob-1-1'>
				<div id='arterial_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='arterial_roads_density_bar' class='city-graphic' data-title='Density of Arterial Roads 1990 - 2015'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='arterial_roads_walking_bar' class='city-graphic' data-title='Share of area within walking distance of arterial roads 1990-2015'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'></div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='arterial_roads_beeline_bar' class='city-graphic' data-title='Beeline distance to arterial road 1990-2015'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'></div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
				<h3 class='sectionSubHeader' id='blocks_and_plots'>Blocks and Plots</h3>
				<p>This is a placeholder for dynamic descriptive text of the following graphics.</p>
			</div>
			<div class='col-4-5 mob-1-1'>
				<div id='blocks_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='blocks_plots_average_block_bar' class='city-graphic' data-title='Average Block Size'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='blocks_plots_average_bar' class='city-graphic' data-title='Average Plot Size'></canvas>
			</div>
		</div>
	</div>
</div>
