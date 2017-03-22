<div class='grid wide'>
	<div class='col-2-4 tab-1-1'>
	<h1>The City as a Unit of Analysis and the Universe of Cities</h1>
	<div class="atlas-downloads">
		<h4>Atlas of Urban Expansion, 2016 edition</h4>
		<table class="download-table">
			<tr>
				<td><img src="http://media.planum.bedita.net/c7/89/00-At_c789d34a96511cfbcca5726ef8fe49e1/00-Atlas-of-urban-expansion-cover_x700_3c8c3a65de519e8877f756f7d2097a40.jpg" width="100"></td>
				<td>
					<p><a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Full%20Volumes/Atlas%20of%20Urban%20Expansion%202016%20Volume%201%20-%20Areas%20and%20Densities.pdf?time=1476445777143">Volume 1: Areas and Densities</a> <span class="download-size">(PDF – 649 Mb)</span><br>
					<a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Full%20Volumes/Atlas%20of%20Urban%20Expansion%202016%20Volume%202%20-%20Blocks%20and%20Roads.pdf?time=1476445725960">Volume 2: Blocks and Roads</a> <span class="download-size">(PDF – 932 Mb)</span></p>
				</td>
			</tr>
		</table>
		<h4>Methodology</h4>
		<table class="download-table">
			<tr>
				<td><img src="http://media.planum.bedita.net/c7/89/00-At_c789d34a96511cfbcca5726ef8fe49e1/00-Atlas-of-urban-expansion-cover_x700_3c8c3a65de519e8877f756f7d2097a40.jpg" width="100"></td>
				<td>
					<p><a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/The_Global_Sample_of_Cities.pdf?time=1476446504182">The Global Sample of Cities</a> <span class="download-size">(PDF)</span><br>
					<a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/Understanding_and_Measuring_Urban_Expansion.pdf?time=1476446554646">Understanding and Measuring Urban Expansion</a> <span class="download-size">(PDF)</span><br>
					<a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/Understanding_and_Measuring_Urban_Layouts.pdf?time=1476446569669">Understanding and Measuring Urban Layouts</a> <span class="download-size">(PDF)</span></p>
				</td>
			</tr>
		</table>
		<h4>Tables</h4>
		<table class="download-table">
			<tr>
				<td>&nbsp;</td>
				<td>
					<p>Areas and Densities <a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Areas_and_Densities_Tables/Areas_and_Densities_Table_1.csv?time=1476445928498">CSV</a>,&nbsp;<a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Areas_and_Densities_Tables/Areas_and_Densities_Table_1.xlsx?time=1476445970255">XLSX</a>&nbsp;<br>
					Blocks and Roads <a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_1.csv?time=1476446017157">CSV</a>,&nbsp;<a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_1.xlsx?time=1476446050567">XLSX</a><br>
					Historical Data for Blocks and Roads <a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_2.csv?time=1476446170646">CSV</a>,&nbsp;<a class="download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_2.xlsx?time=1476446193604">XLSX</a></p>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
<p>We focus our monitoring efforts on cities of 100,000 people or more. Different countries have adopted different thresholds for a human settlement to be considered a ‘city’, but there is near universal agreement that a settlement of 100,000 people or more constitutes a city. We also focus our attention not on single municipalities but on entire metropolitan areas: contiguous urban areas that may contain many municipalities are considered to be a single city.</p>
<p>We define cities by the extent of their built-up area, rather than by their administrative or its jurisdictional boundaries. The <i>extrema tectorum</i> — the limit of the built-up area of the city, as it was referred to in Ancient Rome — defines the city, and the city thus defined is our unit of analysis. We have now identified 4,245 cities on our planet that were homes to 100,000 people or more in 2010. These 4,245 cities constitute our Universe of Cities with a total population amounted to 2.5 billion, or 70 percent of the world’s 2010 urban population of 3.6 billion.</p><br/>
	
			</div>
	</div>
</div>
<!-- <div class='grid wide'>
	<div class='col-2-3 tab-1-1'>
		<div class='show-methodology'>Show Methodology</div>
		<div class='methodology display-none'>
			<?// $methodologyText["Text"]["content"];?>
		</div>
	</div>
</div> -->

<div class='grid wide data'>
	<div class='col-1-1'>
		<div id="data-table">
			<input class="search" placeholder="Filter" />
			<table class='data-table'>
				<thead>
					<tr>
						<th class='sort' data-sort="name" data-sort-default="desc" >City</th>
						<th class='sort' data-sort="country">Country</th>
				 		<?/*<th data-sort="string">Region</th>
						<th data-sort="int">GDP</th>
						<th data-sort="int">City Size</th> */?>
						<th class='no-sort hide-on-mobile'>Areas and Densities</th>
						<th class='no-sort hide-on-mobile'>Blocks and Roads</th>
						<th class='no-sort hide-on-mobile'>Historical Data</th>
						<th class='no-sort hide-on-desktop'>Downloads</th>
					</tr>
				</thead>
				<tbody class='list'>
				<?
				$download_path = "/file-manager/userfiles/data_page/";
				foreach($cities as $i=>$city):?>
					<tr>
						<td class='name'><a href='/cities/view/<?=$city["City"]["slug"];?>'><?= $city["City"]["name"];?></a></td>
						<td class='country'><?= $city["City"]["country"];?></td>

						<?
										$map1 = $download_path."Phase I Maps/".$city["City"]["areas_and_densities_map_path"];
										$map1 = file_exists(APP . "webroot/" . $map1) ? $map1 : false;
										$metric1 = $download_path."Phase I Metrics/".$city["City"]["areas_and_densities_p_d_f_path"];
										$metric1 = file_exists(APP . "webroot/" . $metric1) ? $metric1 : false;
										$gis1 = $download_path."Phase I GIS/".$city["City"]["areas_and_densities_g_i_s_path"];
										$gis1 = file_exists(APP . "/webroot/" . $gis1) ? $gis1 : false;


										$map2 = $download_path."Phase II Maps/".$city["City"]["blocks_and_roads_map_path"];
										$map2 = file_exists(APP . "webroot/" . $map2) ? $map2 : false;
										$metric2 = $download_path."Phase II Metrics/".$city["City"]["blocks_and_roads_p_d_f_path"];
										$metric2 = file_exists(APP . "webroot/" . $metric2) ? $metric2 : false;
										$gis2 = $download_path."Phase II GIS/".$city["City"]["blocks_and_roads_g_i_s_path"];
										$gis2 = file_exists(APP . "/webroot/" . $gis2) ? $gis2 : false;


										$map3 = $download_path."Historical cities maps and metrics/Blocks and Roads Historical Map Pages/".$city["City"]["historical_data_map_path"];
										$map3 = file_exists(APP . "webroot/" . $map3) ? $map3 : false;
										$metric3 = $download_path."Historical cities maps and metrics/Blocks and Roads Historical Metrics Pages/".$city["City"]["historical_data_p_d_f_path"];
										$metric3 = file_exists(APP . "webroot/" . $metric3) ? $metric3 : false;
										$gis3 = $download_path."foobar".$city["City"]["historical_data_g_i_s_path"];
										$gis3 = file_exists(APP . "/webroot/" . $gis3) ? $gis3 : false;

								?>




						<td class='hide-on-mobile'>
							<div class='expansion-links'>
							<?= $map1  ? "<a download href='".$map1."' target='_blank'>Maps</a>" : "<span class='no-file'>Maps</span>";?>
							<?= $metric1  ? "<a download href='".$metric1."' target='_blank'>Metrics</a>" : "<span class='no-file'>Metrics</span>";?>
							<?= $gis1  ? "<a download href='".$gis1."' target='_blank'>GIS</a>" : "<span class='no-file'>GIS</span>";?>
							</div>
						</td>		
						<td class='hide-on-mobile'>
							<div class='expansion-links'>
							<?= $map2  ? "<a download href='".$map2."' target='_blank'>Maps</a>" : "<span class='no-file'>Maps</span>";?>
							<?= $metric2  ? "<a download href='".$metric2."' target='_blank'>Metrics</a>" : "<span class='no-file'>Metrics</span>";?>
							<?= $gis2  ? "<a download href='".$gis2."' target='_blank'>GIS</a>" : "<span class='no-file'>GIS</span>";?>
							</div>
						</td>			
						<td class='hide-on-mobile'>
							<div class='expansion-links'>
							<?= $map3  ? "<a download href='".$map3."' target='_blank'>Maps</a>" : "<span class='no-file'>Maps</span>";?>
							<?= $metric3  ? "<a download href='".$metric3."' target='_blank'>Metrics</a>" : "<span class='no-file'>Metrics</span>";?>
							<?= $gis3  ? "<a download href='".$gis3."' target='_blank'>GIS</a>" : "<span class='no-file'>GIS</span>";?>
							</div>
						</td>
						<td class='hide-on-desktop'>
							<div class='show-links'>Select</div>
							<div class='expansion-links display-none'>
								<?= $map1  ? "<a download href='".$map1."' target='_blank'>Areas and Densities Maps</a>" : "<span class='no-file'>Areas and Densities Maps</span>";?>
								<br \>
								<?= $metric1  ? "<a download href='".$metric1."' target='_blank'>Areas and Densities Metrics</a>" : "<span class='no-file'>Areas and Densities Metrics</span>";?>
								<br \>
								<?= $gis1  ? "<a download href='".$gis1."' target='_blank'>Areas and Densities GIS</a>" : "<span class='no-file'>Areas and Densities GIS</span>";?>
								<br \>
								<?= $map2  ? "<a download href='".$map2."' target='_blank'>Blocks and Roads Maps</a>" : "<span class='no-file'>Blocks and Roads Maps</span>";?>
								<br \>
								<?= $metric2  ? "<a download href='".$metric2."' target='_blank'>Blocks and Roads Metrics</a>" : "<span class='no-file'>Blocks and Roads Metrics</span>";?>
								<br \>
								<?= $gis2  ? "<a download href='".$gis2."' target='_blank'>Blocks and Roads GIS</a>" : "<span class='no-file'>Blocks and Roads GIS</span>";?>
								<br \>
								<?= $map3  ? "<a download href='".$map3."' target='_blank'>Historical Data Maps</a>" : "<span class='no-file'>Historical Data Maps</span>";?>
								<br \>
								<?= $metric3  ? "<a download href='".$metric3."' target='_blank'>Historical Data Metrics</a>" : "<span class='no-file'>Historical Data Metrics</span>";?>
								<br \>
								<?= $gis3  ? "<a download href='".$gis3."' target='_blank'>Historical Data GIS</a>" : "<span class='no-file'>Historical Data GIS</span>";?>
								<br \>
							</div>
						</td>

				 		<?/*<td><?= $city["Region"]["name"];?></td>
			 			<td data-sort-value="<?=$city["GDP"]["id"];?>"><?= $city["GDP"]["name"];?></td>
						<td data-sort-value="<?=$city["CitySize"]["number"];?>"><?= $city["CitySize"]["name"];?></td>*/?>
					</tr>
				<?endforeach;?>
				</tbody>
			</table>
			<div class='page-holder'>
				<ul class='pagination'></ul>
			</div>
			<div class='per-page'>
				<select>
					<option value="10">10 per page</option>
					<option value="50">50 per page</option>
					<option value="100">100 per page</option>
					<option value="200">Show All</option>
				</select>
			</div>
		</div>
	</div>
</div>