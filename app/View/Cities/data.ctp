
<div class='grid about  left'>
	<div class='col-1-1'>
		<div class='page-header'>Datos</div>
	</div>
</div>

<div class='grid left about data-pic-links'>
	<div class='col-1-1'>
		<div class='data-section-title'>Descargar la edición impresa</div>
	</div>
	<div class='col-1-2 mob-1-1'>
		<a class="download-link" download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Full Volumes/Atlas of Urban Expansion 2016 Volume 1 - Areas and Densities.pdf?time=1476445777143">
			<img src='/img/blue-book.png'>
			<div class='download-title'>Volumen 1: Áreas y densidades</div>
			<div class="download-size">(PDF – 649 Mb)</div>
		</a>
	</div>
	<div class='col-1-2 mob-1-1'>
		<a class="download-link" download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Full Volumes/Atlas of Urban Expansion 2016 Volume 2 - Blocks and Roads.pdf?time=1476445725960">
			<img src='/img/red-book.png'>
			<div class='download-title'>Volumen 2: Manzanas y vías</div>
			<div class="download-size">(PDF – 932 Mb)</div>
		</a> 
	</div>
</div>

<div class='grid left about'>
	<div class='col-1-1'>
		<div class='data-section-title border-above'>Metodología</div>
		<div class='data-methodology'>
			<a class=" download-title download-link" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/The_Global_Sample_of_Cities.pdf?time=1476446504182"><span class='under'>Listado de Ciudades</span> (PDF)</a>
			<br/>
			<a class="download-link  download-title " href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/Understanding_and_Measuring_Urban_Expansion.pdf?time=1476446554646"> <span class='under'>Entender y medir la Expansión Urbana</span> (PDF)</a>
			<br/>
			<a class="download-link download-title" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Methodology/Understanding_and_Measuring_Urban_Layouts.pdf?time=1476446569669"> <span class='under'>Entender y medir los trazados urbanos</span> (PDF)</a>
		</div>
		<div class='data-section-title'>Tablas</div>
		<div class='data-tables'>
			<p>
				Áreas y Densidades <a class="download-link " download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Areas_and_Densities_Tables/Areas_and_Densities_Table_1.csv?time=1476445928498">CSV</a>,&nbsp;<a class="download-link download-title" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Areas_and_Densities_Tables/Areas_and_Densities_Table_1.xlsx?time=1476445970255">XLSX</a>&nbsp;<br/>
				Manzanas y vías <a class="download-link " download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_1.csv?time=1476446017157">CSV</a>,&nbsp;<a class="download-link download-title" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_1.xlsx?time=1476446050567">XLSX</a><br/>
				Historical Data for Blocks and Roads <a class="download-link " download="" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_2.csv?time=1476446170646">CSV</a>,&nbsp;<a class="download-link download-title" href="http://atlasofurbanexpansion.org/file-manager/userfiles/data_page/Blocks_and_Roads_Tables/Blocks_and_Roads_Table_2.xlsx?time=1476446193604">XLSX</a>
			</p>
		</div>
	</div>
</div>

<div class='grid left about'>
	<div class='col-1-1 data-analysis'>
		<div class='border-above data-section-title'>
			<p>La ciudad como una unidad de análisis y el universo de ciudades.</p>
		</div>

		<p>El presente análisis estudia 106 municipios y 14 aglomeraciones de diferentes tamaños y regiones de la República de Colombia.
		Si bien existe un acuerdo casi universal según el cual un asentamiento de 100,000 personas o más constituye una ciudad. Este estudio particular ha revisado asentamientos humanos de diferentes tamaños aún por debajo del límite de 100 mil habitantes con el fin de lograr un mejor entendimiento de estos. 
		El presente estudio reconoce municipios individuales, pero adicionalmente analiza aglomeraciones en su conjunto: las áreas urbanas contiguas que pueden contener varios municipios se consideran una sola ciudad.</p>
		<p>Definimos las ciudades por la extensión del área construida, más que por sus límites administrativos o jurisdiccionales. El extrema tectorum -  el límite del área construida de la ciudad, como se calificó en la antigua Roma-  define la ciudad y la ciudad así definida es nuestra unidad de análisis. Hemos identificado 4.231 ciudades en todo el mundo que fueron hogar de 100,000 personas o más en 2010. Estas 4.231 ciudades constituyen nuestro Universo de Ciudades con una población total de 2.500 millones o el 70 por ciento de los 3.600 millones de habitantes urbanos del planeta en 2010.
</p><br/>
	</div>
</div>



<div class='grid data left about'>
	<div class='col-1-1'>
		<div id="data-table">
			<input class="search" placeholder="Ver" />
			<table class='data-table'>
				<thead>
					<tr>
						<th class='sort' data-sort="name" data-sort-default="desc" >Ciudad</th>
						<th class='sort' data-sort="name" data-sort-default="desc" >Departamento</th>
				 		<?/*<th data-sort="string">Region</th>
						<th data-sort="int">GDP</th>
						<th data-sort="int">City Size</th> */?>
						<th class='no-sort hide-on-mobile'>Áreas y densidades</th>
						<th class='no-sort hide-on-mobile'>Manzanas y vías</th>
						<th class='no-sort hide-on-desktop'>Archivos Descargables</th>
					</tr>
				</thead>
				<tbody class='list'>
					<?
					$download_path = "/file-manager/userfiles/data_page/";
					foreach($cities as $i=>$city):?>
					<tr>
						<td class='name'><a href='/cities/view/<?=$city["City"]["slug"];?>'><?= $city["City"]["name"];?></a></td>
						<td class='name'><?= $city["City"]["country"];?></td>
						<?
						$map1 = isset($city["City"]["areas_and_densities_map_path"]) ? $download_path."Phase I Maps/".$city["City"]["areas_and_densities_map_path"] : false;
						$map1 = file_exists(APP . "webroot/" . $map1) ? $map1 : false;

						$metric1 = isset($city["City"]["areas_and_densities_p_d_f_path"]) ? $download_path."Phase I Metrics/".$city["City"]["areas_and_densities_p_d_f_path"] : false;
						$metric1 = file_exists(APP . "webroot/" . $metric1) ? $metric1 : false;

						$gis1 = isset($city["City"]["areas_and_densities_g_i_s_path"]) ? $download_path."Phase I GIS/".$city["City"]["areas_and_densities_g_i_s_path"] : false;
						$gis1 = file_exists(APP . "/webroot/" . $gis1) ? $gis1 : false;


						$map2 = isset($city["City"]["blocks_and_roads_map_path"]) ? $download_path."Phase II Maps/".$city["City"]["blocks_and_roads_map_path"] : false;
						$map2 = file_exists(APP . "webroot/" . $map2) ? $map2 : false;

						$metric2 = isset($city["City"]["blocks_and_roads_p_d_f_path"]) ? $download_path."Phase II Metrics/".$city["City"]["blocks_and_roads_p_d_f_path"] : false;
						$metric2 = file_exists(APP . "webroot/" . $metric2) ? $metric2 : false;

						$gis2 = isset($city["City"]["blocks_and_roads_g_i_s_path"]) ? $download_path."Phase II GIS/".$city["City"]["blocks_and_roads_g_i_s_path"] : false;
						$gis2 = file_exists(APP . "/webroot/" . $gis2) ? $gis2 : false;


						?>




						<td class='hide-on-mobile'>
							<div class='expansion-links'>
								<?= $map1  ? "<a download href='".$map1."' target='_blank'>Mapas</a>" : "<span class='no-file'>Mapas</span>";?>
								<?= $metric1  ? "<a download href='".$metric1."' target='_blank'>Métrica</a>" : "<span class='no-file'>Metrics</span>";?>
								<?= $gis1  ? "<a download href='".$gis1."' target='_blank'>GIS</a>" : "<span class='no-file'>GIS</span>";?>
							</div>
						</td>		
						<td class='hide-on-mobile'>
							<div class='expansion-links'>
								<?= $map2  ? "<a download href='".$map2."' target='_blank'>Mapas</a>" : "<span class='no-file'>Mapas</span>";?>
								<?= $metric2  ? "<a download href='".$metric2."' target='_blank'>Métrica</a>" : "<span class='no-file'>Metrics</span>";?>
								<?= $gis2  ? "<a download href='".$gis2."' target='_blank'>GIS</a>" : "<span class='no-file'>GIS</span>";?>
							</div>
						</td>			
						
						<td class='hide-on-desktop'>
							<div class='show-links'>Seleccione</div>
							<div class='expansion-links display-none'>
								<?= $map1  ? "<a download href='".$map1."' target='_blank'>Mapas de Areas y Densidades</a>" : "<span class='no-file'>Mapas de Areas y Densidades</span>";?>
								<br \>
								<?= $metric1  ? "<a download href='".$metric1."' target='_blank'>Métricas de Areas y Densidades</a>" : "<span class='no-file'>Métricas de Areas y Densidades</span>";?>
								<br \>
								<?= $gis1  ? "<a download href='".$gis1."' target='_blank'>GIS Areas y Densidades</a>" : "<span class='no-file'>GIS Areas y Densidades</span>";?>
								<br \>
								<?= $map2  ? "<a download href='".$map2."' target='_blank'>Mapas de Bloques y Carreteras</a>" : "<span class='no-file'>Mapas de Bloques y Carreteras</span>";?>
								<br \>
								<?= $metric2  ? "<a download href='".$metric2."' target='_blank'>Métricas de Bloques y Carreteras</a>" : "<span class='no-file'>Métricas de Bloques y Carreteras</span>";?>
								<br \>
								<?= $gis2  ? "<a download href='".$gis2."' target='_blank'>GIS de Bloques y Carreteras</a>" : "<span class='no-file'>GIS de Bloques y Carreteras</span>";?>
								
								<br \>
							</div>
						</td>

				 		<?/*<td><?= $city["Region"]["name"];?></td>
			 			<td data-sort-value="<?=$city["GDP"]["id"];?>"><?= $city["GDP"]["name"];?></td>
			 			<td data-sort-value="<?=$city["CitySize"]["number"];?>"><?= $city["CitySize"]["name"];?></td>*/?>
			 		</tr>
			 		<?

			 		endforeach;?>
			 	</tbody>
			 </table>
			 <div class='page-holder'>
			 	<ul class='pagination'></ul>
			 </div>
			 <div class='per-page'>
			 	<select>
			 		<option value="10">10 por página</option>
			 		<option value="50">50 por página</option>
			 		<option value="100">100 por página</option>
			 		<option value="200">Mostrar Todos</option>
			 	</select>
			 </div>
			</div>
		</div>
	</div>