<script>
	var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
</script>
<div class='cityHeader'>
	<div class='grid'>
		<div class='col-2-3 mob-1-1'>
			<div class='flag'><?= $this->Html->image("/file-manager/userfiles/flags/".$city["City"]["flag_path"]);?></div>
			<div class='h1'><?= $city["City"]["name"];?></div>
			<div class="countryName"><?= $city["City"]["country"];?></div>
			<div class="regionName"><?= $city["Region"]["name"];?></div>
		</div>
		<div class='col-1-3 mob-1-1'>
			<div class="cityImage"><img src="/file-manager/userfiles/photos/<?= $city['City']['photo_path'];?>";></div>
		</div>
	</div>
	<div class='grid'>
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
	<div class='grid cityNav'>
		<div class='col-2-3 mob-1-1'>
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
		<div class='col-1-3 mob-1-1'></div>
	</div>
</div>
<div class='graphMainContainer'>
	<div class='section-header'>
		<div class='grid'>
			<div class='col-1-1'>
					<div class='sectionHeader h2'>Areas and Densities</div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
				<div id="population" class='sectionSubHeader h2'>Population</div>
				<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='population_line' class='city-graphic' data-title="Population" height="200px"></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='population_change_bar' class='city-graphic' data-title="Avg. Annual % Change" height="200px"></canvas>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
				<div class='sectionSubHeader h2' id='urban_extent'>Urban Extent</div>
				<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
			</div>
			<div class='col-2-5 mob-1-1'>
				<div id='urban_extent_t1_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<div id='urban_extent_t2_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<div id='urban_extent_t3_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='urban_extent_composition_stacked_bar' class='city-graphic' data-title="Urban Composition"></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='urban_extent_change_bar' class='city-graphic' data-title="Avg. Annual % Change"></canvas>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
				<div class='sectionSubHeader h2' id='density'>Density</div>
				<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='density_built_up_line' class='city-graphic' data-title='Built-up Area Density'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='density_built_up_change_bar' class='city-graphic' data-title="Built-up Area Avg. Annual % Change"></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='density_urban_extent_line' class='city-graphic' data-title='Urban Extent Density'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='density_urban_extent_change_bar' class='city-graphic' data-title='Urban Extent Avg. Annual % Change'></canvas>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
				<div class='sectionSubHeader h2' id='composition_of_added_area'>Composition of Added Area</div>
				<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
				</div>
			<div class='col-2-5 mob-1-1'>
				<div id='composition_t1_t2_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<div id='composition_t2_t3_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
		</div>
	</div>
	<div class='section-header'>
		<div class='grid'>
			<div class='col-1-1'>
				<div class='sectionHeader'>Blocks and Roads</div>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
				<div class='sectionSubHeader h2' id='roads'>Roads</div>
				<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
			</div>
			<div class='col-2-5 mob-1-1'>
				<div id='roads_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='roads_in_built_up_area_bar' class='city-graphic' data-title='Share of built up area occupied by roads and boulevards'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>	
			<div class='col-2-5 mob-1-1'>
				<canvas id='roads_average_width_bar' class='city-graphic' data-title='Average Street Width'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='roads_width_stacked_bar' class='city-graphic', data-title='Street Width Composition'></canvas>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
				<div class='sectionSubHeader h2' id='arterial_roads'>Arterial Roads</div>
				<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
			</div>
			<div class='col-2-5 mob-1-1'>
				<div id='arterial_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='arterial_roads_density_bar' class='city-graphic' data-title='Density of Arterial Roads 1990 - 2015'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='arterial_roads_walking_bar' class='city-graphic' data-title='Share of area within walking distance of arterial roads 1990-2015'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='arterial_roads_beeline_bar' class='city-graphic' data-title='Beeline distance to arterial road 1990-2015'></canvas>
			</div>
		</div>
	</div>
	<div class='graphSection'>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
				<div class='sectionSubHeader h2' id='blocks_and_plots'>Blocks and Plots</div>
				<div class='sectionText'>This is a placeholder for dynamic descriptive text of the following graphics.</div>
			</div>
			<div class='col-2-5 mob-1-1'>
				<div id='blocks_map' class='city-graphic'></div>
				<canvas class='map-placeholder'></canvas>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='blocks_plots_average_block_bar' class='city-graphic' data-title='Average Block Size'></canvas>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 mob-1-1'>
			</div>
			<div class='col-2-5 mob-1-1'>
				<canvas id='blocks_plots_average_bar' class='city-graphic' data-title='Average Plot Size'></canvas>
			</div>
		</div>
	</div>
</div>