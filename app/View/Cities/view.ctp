<script>
	var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
</script>
<div class='cityHeader' style='background-image:url("/file-manager/userfiles/photos/<?= $city['City']['photo_path'];?>");'>
	<div class='grid'>
		<div class='col-1-1'>
			<div class='flag'><?= $this->Html->image("/file-manager/userfiles/flags/".$city["City"]["flag_path"]);?></div>

			<div class='h1'><?= $city["City"]["name"].", ".$city["City"]["country"];?></div>

			<div class='h2'><?= $city["Region"]["name"];?></div>

			<table class='citySummaryTable'>
				<tr>
					<th></th>
					<th>Population</th>
					<th>Urban Extant</th>
					<th>Density</th>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>hectares</td>
					<td>persons/hectare</td>
				</tr>
				<tr>
					<td>T3</td>
					<td><?= $city["City"]["population"];?></td>
					<td><?= $city["City"]["extent"];?></td>
					<td><?= $city["City"]["density"];?></td>
				</tr>
			</table>

			<div>AREAS AND DENSITIES:
				<?= $this->Html->link("Population", "#population", array("class"=>"navJump"));?>,
				<?= $this->Html->link("Urban Extent", "#urban_extent", array("class"=>"navJump"));?>,
				<?= $this->Html->link("Density", "#density", array("class"=>"navJump"));?>,
				<?= $this->Html->link("Composition of Added Area", "#composition_of_added_area", array("class"=>"navJump"));?>
			</div>
			<div>BLOCKS AND ROADS:
				<?= $this->Html->link("Roads", "#roads", array("class"=>"navJump"));?>,
				<?= $this->Html->link("Arterial Roads", "#arterial_roads", array("class"=>"navJump"));?>,
				<?= $this->Html->link("Blocks and Plots", "#blocks_and_plots", array("class"=>"navJump"));?>,
			</div>
		</div>
	</div>
</div>
<div class='grey-bg'>
	<div class='grid'>
		<div class='col-1-1'>
				<div class='sectionHeader h2'>AREAS AND DENSITIES</div>
		</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-1'>
		<div id="population" class='sectionSubHeader h2'>Population</div>
		<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
		<canvas id='population_line' class='city-graphic' data-title="Population" height="200px"></canvas>
	</div>
	<div class='col-1-2 mob-1-1'>
		<canvas id='population_change_bar' class='city-graphic' data-title="Avg. Annual % Change" height="200px"></canvas>
	</div>
</div>
<div class='lightgrey-bg'>
	<div class='grid'>
		<div class='col-1-1'>
			<div class='sectionSubHeader h2' id='urban_extent'>Urban Extent</div>
			<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
		</div>
	</div>
	<div class='grid'>
		<div class='col-1-2 mob-1-1'>
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
					var outline = L.tileLayer('http://localhost:8888/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_outline/{z}/{x}/{y}.png', {tms: true}).addTo(map);
					var urban = L.tileLayer('http://localhost:8888/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_urban/{z}/{x}/{y}.png', {tms: true});
					var suburban = L.tileLayer('http://localhost:8888/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_suburban/{z}/{x}/{y}.png', {tms: true});
					var rural = L.tileLayer('http://localhost:8888/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_rural/{z}/{x}/{y}.png', {tms: true});
					var openSpace = L.tileLayer('http://localhost:8888/tiles/show/<?= strtolower($city['City']['name']) ?>-urban_extent_t2_open_space/{z}/{x}/{y}.png', {tms: true});

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
		<div class='col-1-2 mob-1-1'>
			<div id='urban_extent_t2_map' class='city-graphic'></div>
		</div>
	</div>
	<div class='grid'>
		<div class='col-1-2 mob-1-1'>
			<div id='urban_extent_t3_map' class='city-graphic'></div>
		</div>
		<div class='col-1-2 mob-1-1'>
			<canvas id='urban_extent_composition_stacked_bar' class='city-graphic' data-title="Urban Composition"></canvas>
		</div>
	</div>
	<div class='grid'>
		<div class='col-1-2 mob-1-1'>
			<canvas id='urban_extent_change_bar' class='city-graphic'></canvas>
		</div>
		<div class='col-1-2 mob-1-1'>
		</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-1'>
		<div class='sectionSubHeader h2' id='density'>Density</div>
		<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
		<canvas id='density_built_up_line' class='city-graphic'></canvas>
	</div>
	<div class='col-1-2 mob-1-1'>
		<div id='density_built_up_change_bar' class='city-graphic'></div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
		<div id='density_urban_extent_line' class='city-graphic'></div>
	</div>
	<div class='col-1-2 mob-1-1'>
		<div id='density_urban_extent_change_bar' class='city-graphic'></div>
	</div>
</div>
<div class='lightgrey-bg'>
	<div class='grid'>
		<div class='col-1-1'>
			<div class='sectionSubHeader h2' id='composition_of_added_area'>Composition of Added Area</div>
			<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
		</div>
	</div>
	<div class='grid'>
		<div class='col-1-2 mob-1-1'>
			<div id='composition_t1_t2_map' class='city-graphic'></div>
		</div>
		<div class='col-1-2 mob-1-1'>
			<div id='composition_t2_t3_map' class='city-graphic'></div>
		</div>
	</div>
</div>
<div class='grey-bg'>
	<div class='grid'>
		<div class='col-1-1'>
			<div class='sectionHeader'>BLOCKS AND ROADS</div>
		</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-1'>
		<div class='sectionSubHeader h2' id='roads'>Roads</div>
		<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
		<div id='roads_map' class='city-graphic'></div>
	</div>
	<div class='col-1-2 mob-1-1'>
		<div id='roads_in_built_up_area_bar' class='city-graphic'></div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
		<div id='roads_average_width_bar' class='city-graphic'></div>
	</div>
	<div class='col-1-2 mob-1-1'>
		<div id='roads_width_stacked_bar' class='city-graphic'></div>
	</div>
</div>
<div class='lightgrey-bg'>
	<div class='grid'>
		<div class='col-1-1'>
			<div class='sectionSubHeader h2' id='arterial_roads'>Arterial Roads</div>
			<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
		</div>
	</div>
	<div class='grid'>
		<div class='col-1-2 mob-1-1'>
			<div id='arterial_map' class='city-graphic'></div>
		</div>
		<div class='col-1-2 mob-1-1'>
			<div id='arterial_roads_density_bar' class='city-graphic'></div>
		</div>
	</div>
	<div class='grid'>
		<div class='col-1-2 mob-1-1'>
			<div id='arterial_roads_walking_bar' class='city-graphic'></div>
		</div>
		<div class='col-1-2 mob-1-1'>
			<div id='arterial_roads_beeline_bar' class='city-graphic'></div>
		</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-1'>
		<div class='sectionSubHeader h2' id='blocks_and_plots'>Blocks and Plots</div>
		<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
		<div id='blocks_map' class='city-graphic'></div>
	</div>
	<div class='col-1-2 mob-1-1'>
		<div id='blocks_plots_average_block_bar' class='city-graphic'></div>
	</div>
</div>
<div class='grid'>
	<div class='col-1-2 mob-1-1'>
		<div id='blocks_plots_average_bar' class='city-graphic'></div>
	</div>
	<div class='col-1-2 mob-1-1'>
	</div>
</div>
<div class='grid'>
	<div class='col-1-1'>
	<? debug($city);?>
	</div>
</div>
