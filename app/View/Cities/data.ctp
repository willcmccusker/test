<? $this->assign('title', "Data");?>
<div class='grid wide'>
	<div class='col-2-3 tab-1-1'>
		<?= $dataText["Text"]["content"];?>
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

<div class='grid wide data-page'>
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
										// $map1 = is_file(APP . "/webroot/" . $map1) ? $map1 : false;
										$metric1 = $download_path."Phase I Metrics/".$city["City"]["areas_and_densities_map_path"];
										// $metric1 = is_file(APP . "/webroot/" . $metric1) ? $metric1 : false;
										$gis1 = $download_path."Phase I GIS/".$city["City"]["areas_and_densities_map_path"];
										// $gis1 = is_file(APP . "/webroot/" . $gis1) ? $gis1 : false;


										$map2 = $download_path."Phase II Maps/".$city["City"]["blocks_and_roads_map_path"];
										// $map2 = is_file(APP . "/webroot/" . $map2) ? $map2 : false;
										$metric2 = $download_path."Phase II Metrics/".$city["City"]["blocks_and_roads_map_path"];
										// $metric2 = is_file(APP . "/webroot/" . $metric2) ? $metric2 : false;
										$gis2 = $download_path."Phase II GIS/".$city["City"]["blocks_and_roads_map_path"];
										// $gis2 = is_file(APP . "/webroot/" . $gis2) ? $gis2 : false;


										$map3 = $download_path."Historical cities maps and metrics/Blocks and Roads Historical Map Pages/".$city["City"]["historical_data_map_path"];
										// $map3 = is_file(APP . "/webroot/" . $map3) ? $map3 : false;
										$metric3 = $download_path."Historical cities maps and metrics/Blocks and Roads Historical Metrics Pages/".$city["City"]["historical_data_map_path"];
										// $metric3 = is_file(APP . "/webroot/" . $metric3) ? $metric3 : false;
										$gis3 = $download_path."foobar".$city["City"]["historical_data_map_path"];
										// $gis3 = is_file(APP . "/webroot/" . $gis3) ? $gis3 : false;

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