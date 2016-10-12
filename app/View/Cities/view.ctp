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
					<div><?= number_format($city["City"]["density"], 0);?> persons/hectare</div>
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
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='population_change_bar' class='city-graphic' data-unit="%" data-title="Avg. Annual % Change" height="350px"></canvas>
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
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='urban_extent_composition_stacked_bar' class='city-graphic'  data-title="Urban Composition" height="350px"></canvas>
				</div>
				<div class='col-1-4 mob-1-1 no-pad  hold-legend'></div>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
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
				<ul>
					<li> <label><input class="periodToggle addedArea" type="radio" name="period" value="t1" checked="checked" data-target="addedArea"/> T1 </label>
					<li> <label><input class="periodToggle addedArea" type="radio" name="period" value="t2" data-target="addedArea" /> T2 </label>
				</ul>
				<ul>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="builtUp" data-target="addedArea"/> Built-up area </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="infill" data-target="addedArea"/> Infill </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="extension" data-target="addedArea"/> Extension </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="leapfrog" data-target="addedArea"/> Leapfog </label>
					<li> <label><input class="layerToggle addedArea" type="checkbox" checked="checked" name="inclusion" data-target="addedArea"/> Inclusion </label>
				</ul>
				</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='composition_of_added_area_map' class='city-map'></div>
			</div>
			<script>
				L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og';

				var make_composition_of_added_area_map = function(){

					var addedArea = L.mapbox.map('composition_of_added_area_map', 'mapbox.light', {
						center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
						zoom: 11,
						scrollWheelZoom : false
					});


					var addedArea_t1_outline = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/urban_edge_t1/{z}/{x}/{y}.png', {tms: true});
					var addedArea_t1_builtUp = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/built_up_area_t1/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t1_infill = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/infill_t1_t2/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t1_extension = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/extension_t1_t2/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t1_leapfrog = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/leapfrog_t1_t2/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t1_inclusion = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/inclusion_t1_t2/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t2_outline = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/urban_edge_t2/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t2_builtUp = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/built_up_area_t2/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t2_infill = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/infill_t2_t3/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t2_extension = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/extension_t2_t3/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t2_leapfrog = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/leapfrog_t2_t3/{z}/{x}/{y}.png', {tms: true });
					var addedArea_t2_inclusion = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/inclusion_t2_t3/{z}/{x}/{y}.png', {tms: true });

					var addedArea_t1_layer = L.layerGroup([addedArea_t1_outline, addedArea_t1_builtUp, addedArea_t1_infill, addedArea_t1_extension, addedArea_t1_leapfrog, addedArea_t1_inclusion]).addTo(addedArea);
					var addedArea_t2_layer = L.layerGroup([addedArea_t2_outline, addedArea_t2_builtUp, addedArea_t2_infill, addedArea_t2_extension, addedArea_t2_leapfrog, addedArea_t2_inclusion]);

					var style = L.mapbox.styleLayer('mapbox://styles/willcmccusker/citydnrig00682io4flsusb20').addTo(addedArea);
				
					$('.periodToggle').change(function(event) {
						target = $(event.target).data("target");
						prefix = $('.' + target +'.periodToggle:checked').val();
						targetMap = window[target];
						t1Layer = window[target + '_' + 't1_layer'];
						t2Layer = window[target + '_' + 't2_layer'];

						if(prefix == 't1'){
							targetMap.addLayer(t1Layer)
							targetMap.removeLayer(t2Layer);
							style.bringToFront();
						}else{
							targetMap.addLayer(t2Layer)
							targetMap.removeLayer(t1Layer);
							style.bringToFront();
						}

						$('.' + target + '.layerToggle:checked').each(function(index, el){
							selectedLayer = window[target + '_' + prefix + '_' + $(el).prop('name')];
							selectedLayer.setOpacity(1);
						});
					});

						$('.layerToggle').change(function() {
							target = $(event.target).data("target");
							prefix = $('.' + target +'.periodToggle:checked').val();
							layer = window[target + '_' + prefix + '_' + $(this).prop('name')];

							if($(this).is(':checked')) {
								layer.setOpacity(1).bringToFront();
								style.bringToFront();
							}else{
								layer.setOpacity(0).bringToBack();
							}
							});
						/*$('.layerToggle').change(function() {
						var layerName = $('.periodToggle:checked').val() + '_' + $(this).prop('name'),
							layer = eval(layerName);


						if($(this).is(':checked')) {
							layer.setOpacity(1).bringToFront();
						}else{
							layer.setOpacity(0).bringToBack();
						}
					});*/

				}
		</script>
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
				<script src="/file-manager/userfiles/json/<?= $city['City']['slug'] ?>/locales_t0.json" type="text/javascript"></script>
				<script>

				var make_roads_map = function(){
					var roadsMap = L.mapbox.map('roads_map', 'mapbox.satellite', {
						center: [<?= $city['City']['latitude'] ?>, <?= $city['City']['longitude'] ?>],
						zoom: 14,
						scrollWheelZoom : false
					});

					var t1_outline = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/added_area/urban_edge_t1/{z}/{x}/{y}.png', {tms: true}).addTo(roadsMap)
					var t1_roads = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/roads/roads_t0/{z}/{x}/{y}.png', {tms: true});
					var t1_locales = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/roads/locales_t0/{z}/{x}/{y}.png', {tms: true});

					var t2_roads = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/roads/roads_t2/{z}/{x}/{y}.png', {tms: true});
					var t2_locales = L.tileLayer('/tiles/show/<?= $city['City']['slug'] ?>/roads/locales_t2/{z}/{x}/{y}.png', {tms: true})

					var t1Roads = L.layerGroup([t1_roads, t1_locales]).addTo(roadsMap);
					var t2Roads = L.layerGroup([t2_roads, t2_locales]);

					var t1_clickable = L.geoJson(locales_t0,{
						weight:1,
						color: 'red',
						fillColor: "#000",
						fillOpacity: 0,
						onEachFeature: function(feature, layer) {
							layer.on('click', function(e) {
								roadsMap.setView(e.latlng, 17);
							});
						}
					}).addTo(roadsMap);
					$('.roadsPeriod').change(function() {
						var prefix = $('.roadsPeriod:checked').val();

						if(prefix == 't1'){
							map.addLayer(t1)
							map.removeLayer(t2);
						}else{
							map.addLayer(t2)
							map.removeLayer(t1);
						}

						$('.layerToggle:checked').each(function(index, el){
							var layer = eval(prefix + '_' + $(el).prop('name'));
							layer.setOpacity(1).bringToFront();
						});
					});

					

				};
			
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
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='arterial_map' class='city-map'></div>
			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='arterial_roads_density_bar' class='city-graphic' data-title='Density of Arterial Roads (km/km2)' data-unit=" km/km2" height="350px"></canvas>
					<div class='years' >
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 – 2015</span>
					</div>
				</div>
				<div class='col-1-4 mob-1-1 no-pad hold-legend'></div>
			</div>
			<div class='position-relative col-2-5 tab-1-2 mob-1-1'>
				<div class='col-3-4 mob-1-1 no-pad year-switch-graphic'>
					<canvas id='arterial_roads_walking_bar' class='city-graphic' data-title='Share of Area Within Walking Distance of Arterial Roads' data-unit="%" data-multiply="100" height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 – 2015</span>
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
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 – 2015</span>
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
			</div>
			<div class='col-4-5 tab-1-1 mob-1-1'>
				<div id='blocks_map' class='city-map'></div>

			</div>
		</div>
		<div class='grid wide'>
			<div class='col-1-5 tab-1-1 mob-1-1'>
			</div>
			<div class='col-2-5 tab-1-2 mob-1-1'>
				<div class='position-relative col-3-4 mob-1-1 no-pad year-switch-graphic '>
					<canvas id='blocks_and_plots_composition_special_stacked' class='city-graphic' data-title='Share of Residential Land Use Settlements' height="350px"></canvas>

					<div class='years'>
						<span class='switchYear activeYear' data-year="1990">Pre 1990</span>&nbsp;
						<span class='switchYear' data-year="2015">1990 – 2015</span>
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
