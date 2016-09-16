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
			<div id='urban_extent_t1_map' class='city-graphic'></div>
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
			<div id='urban_extent_change_bar' class='city-graphic'></div>
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