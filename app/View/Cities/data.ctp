<? $this->assign('title', "Data");?>
<div class='grid'>
<div class='col-1-1'>
<a href='/file-manager/userfiles/special/Areas and Densities PDF.pdf' target="_blank">Areas and Densities PDF</a>
|
<a href='/file-manager/userfiles/special/Blocks and Roads PDF' target="_blank">Blocks and Roads PDF</a>
|
<a href='/build_data/data.csv' target="_blank">Download CSV</a>
</div>
</div>
<div class='grid '>
	<div class='col-1-1'>
		<?= $dataText["Text"]["content"];?>
	</div>
</div>
<div class='grid '>
	<div class='col-1-1'>
		<div class='show-methodology'>Show Methodology</div>
		<div class='methodology display-none'>
			<?= $methodologyText["Text"]["content"];?>
		</div>
	</div>
</div>

<div class='grid  data-page'>
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
				foreach($cities as $i=>$city):?>
					<tr>
						<td class='name'><a href='/cities/view/<?=$city["City"]["slug"];?>'><?= $city["City"]["name"];?></a></td>
						<td class='country'><?= $city["City"]["country"];?></td>
						<td class='hide-on-mobile'>
							<div class='expansion-links'>
								<a href='<?=$city["City"]["areas_and_densities_p_d_f_path"];?>' target="_blank">PDF</a>
								<a href='<?=$city["City"]["areas_and_densities_g_i_s_path"];?>' target="_blank">GIS</a>
							</div>
						</td>			
						<td class='hide-on-mobile'>
							<div class='expansion-links'>
								<a href='<?=$city["City"]["blocks_and_roads_p_d_f_path"];?>' target="_blank">PDF</a>
								<a href='<?=$city["City"]["blocks_and_roads_g_i_s_path"];?>' target="_blank">GIS</a>
							</div>
						</td>			
						<td class='hide-on-mobile'>
							<div class='expansion-links'>
								<a href='<?=$city["City"]["historical_data_p_d_f_path"];?>' target="_blank">PDF</a>
								<a href='<?=$city["City"]["historical_data_g_i_s_path"];?>' target="_blank">GIS</a>
							</div>
						</td>
						<td class='hide-on-desktop'>
							<div class='show-links'>Select</div>
							<div class='expansion-links display-none'>
								<a href='<?=$city["City"]["areas_and_densities_p_d_f_path"];?>' target="_blank">Areas and Densities PDF</a>
								<br \>
								<a href='<?=$city["City"]["areas_and_densities_g_i_s_path"];?>' target="_blank">Areas and Densities GIS</a>
								<br \>
								<a href='<?=$city["City"]["blocks_and_roads_p_d_f_path"];?>' target="_blank">Blocks and Roads PDF</a>
								<br \>
								<a href='<?=$city["City"]["blocks_and_roads_g_i_s_path"];?>' target="_blank">Blocks and Roads GIS</a>
								<br \>
								<a href='<?=$city["City"]["historical_data_p_d_f_path"];?>' target="_blank">Historical Data PDF</a>
								<br \>
								<a href='<?=$city["City"]["historical_data_g_i_s_path"];?>' target="_blank">Historical Data GIS</a>
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