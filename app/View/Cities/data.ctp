<? $this->assign('title', "Data");?>
<div class='grid wide'>
	<div class='col-1-4 tab-1-1'>
	</div>
		<!--<?= $dataText["Text"]["content"];?>-->
	<div class='col-2-4 tab-1-1'>
	<h1>The City as a Unit of Analysis and the Universe of Cities</h1>
<p>We focus our monitoring efforts on cities of 100,000 people or more. Different countries have adopted different thresholds for a human settlement to be considered a ‘city’, but there is near universal agreement that a settlement of 100,000 people or more constitutes a city. We also focus our attention not on single municipalities but on entire metropolitan areas: contiguous urban areas that may contain many municipalities are considered to be a single city.</p>
<p>We define cities by the extent of their built-up area, rather than by their administrative or its jurisdictional boundaries. The extrema tectorum—the limit of the built-up area of the city, as it was referred to in Ancient Rome—defines the city, and the city thus defined is our unit of analysis. We have now identified 4,245 cities on our planet that were homes to 100,000 people or more in 2010. These 4,245 cities constitute our Universe of Cities with a total population amounted to 2.5 billion, or 70 percent of the world’s 2010 urban population of 3.6 billion.</p>
	<h4><span style="color: inherit; font-family: inherit; font-size: 18px;">Atlas of Urban Expansion 2016 edition</span></h4>
	<p><a download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Full Volumes/Atlas of Urban Expansion 2016 Volume 1 - Areas and Densities.pdf?time=1476445777143">Volume 1: Areas and Densities 649 Mb<br></a><a download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Full Volumes/Atlas of Urban Expansion 2016 Volume 2 - Blocks and Roads.pdf?time=1476445725960">Volume 2: Blocks and Roads 932 Mb</a></p>
	<h4>Methodology</h4>
	<p><a href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/The_Global_Sample_of_Cities.pdf?time=1476446504182">PDF</a>&nbsp;The Global Sample of Cities
		<br><a href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/Understanding_and_Measuring_Urban_Expansion.pdf?time=1476446554646">PDF</a>&nbsp;Understanding and Measuring Urban Expansion
		<br><a href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/Understanding_and_Measuring_Urban_Layouts.pdf?time=1476446569669" style="background-color: rgb(255, 255, 255);">PDF</a>&nbsp;Understanding and Measuring Urban Layouts</p>
		<h4><span style="color: inherit; font-family: inherit; font-size: 18px;">Tables</span></h4>
		<p><span style="color: inherit; font-family: inherit;"><a download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Areas_and_Densities_Tables/Areas_and_Densities_Table_1.csv?time=1476445928498">CSV</a>&nbsp;|&nbsp;</span><a href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Areas_and_Densities_Tables/Areas_and_Densities_Table_1.xlsx?time=1476445970255">XLSX</a>&nbsp;<span style="color: inherit; font-family: inherit;">Areas and Densities&nbsp;<br></span><a download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_1.csv?time=1476446017157" style="background-color: rgb(255, 255, 255); outline: 0px;">CSV</a>
			<font color="rgba(0, 0, 0, 0)">&nbsp;</font>|
			<font color="rgba(0, 0, 0, 0)">&nbsp;</font><a href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_1.xlsx?time=1476446050567">XLSX</a>&nbsp;Blocks and Roads
			<br><a download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_2.csv?time=1476446170646" style="outline: 0px;">CSV</a>
			<font color="rgba(0, 0, 0, 0)">&nbsp;</font>|
			<font color="rgba(0, 0, 0, 0)">&nbsp;</font><a href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_2.xlsx?time=1476446193604">XLSX</a>&nbsp;<span style="color: inherit; font-family: inherit;">Historical Data for Blocks and Roads</span></p>
			<p></p>
			<p></p>

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