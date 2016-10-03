<? $this->assign('title', "Data");?>
<div class='grid data-page'>
<div class='col-1-1'>
<table id="data-table">
	<thead>
		<tr>
			<th data-sort="string">City</th>
			<th data-sort="string">Country</th>
			<th data-sort="string">Region</th>
			<th data-sort="int">GDP</th>
			<th data-sort="int">City Size</th>
			<th class="no-sort" >Downloads: <?= $this->Html->link("CSV", array("controller"=>"/build_data/data.csv", "escape"=>false, "target"=>"_blank"));?></th>
		</tr>
	</thead>
	<tbody>
	<?foreach($cities as $city):?>
		<tr>
			<td><?= $city["City"]["name"];?></td>
			<td><?= $city["City"]["country"];?></td>
			<td><?= $city["Region"]["name"];?></td>
			<td data-sort-value="<?=$city["GDP"]["id"];?>"><?= $city["GDP"]["name"];?></td>
			<td data-sort-value="<?=$city["CitySize"]["number"];?>"><?= $city["CitySize"]["name"];?></td>
			<td>
				<div class='expansion-links'>
				<?= $this->Html->link("PDF", array("controller"=>$city["City"]["p_d_f_path"], "target"=>"_blank"));?>
					&nbsp;
				<?= $this->Html->link("GIS", array("controller"=>$city["City"]["g_i_s_path"], "target"=>"_blank"));?>
				</div>
			</td>
		</tr>
	<?endforeach;?>
	</tbody>
</table>
</div>
</div>