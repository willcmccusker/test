<? $this->assign('title', "Historical");?>
<div class='historical'>
<div class='grid wide'>
	<div class='col-1-2 tab-1-1'>
	<h1>Historical Data: Animations of Urban Growth</h1>
		<p>As part of an earlier research project, the original Atlas of Urban Expansion, the urban extents of 30 cities were identified from 1800 to 2000 using a combination of historical maps and contemporary satellite imagery. This work has been extended in the current Atlas to include the urban extents in 2014. An animation of the growth of each of these 30 cities can be seen in the videos below, along with the years for which maps were available. The trajectory of growth between map years has been interpolated.</p>
<p>In addition to extending the time horizon of the project, Blocks and Roads metrics were calculated for the area of each city that was constructed during five separate historical periods: pre-1900, 1900–1930, 1930–1960, 1960–1990, and ~1990–2014. The tables containing this data are available for download, as well as PDF pages showing the maps used in the analysis, and GIS data pertaining to each city. The full dataset containing all of the historical map boundaries is also available for download here.</p>
	</div>
</div>

<?php
$path = APP . "webroot/file-manager/userfiles/data_page/Animations/";

if ($handle = opendir($path)) {
	$i=0;
	$files = array();
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;
        // debug(strrpos($file, ".mp4"));
        if(strrpos($file, ".mp4") == false) continue;
       $files[] =  $file;
	}
	sort($files);
	foreach($files as $file){
        // debug($i%2);
        // debug($file);
        $video = '<video muted controls preload="none" poster="/file-manager/userfiles/data_page/Animations/'.str_replace(" ", "", str_replace(".mp4", ".jpg", $file) ).'">
				<source src="/file-manager/userfiles/data_page/Animations/'.$file.'" type="video/mp4">
			</video>';


        if($i%2 == 0){?>
		<div class='grid wide'>
			<div class='col-2-5 tab-1-1'>
			<?=$video;?>
			</div>
    	<?}elseif($i%2 == 1){?>
			<div class='col-2-5 tab-1-1'>
			<?=$video;?>
			</div>
			<div class='col-1-5 tab-1-1'></div>
		</div>
        <?}

        $i++;

        // do something with the file
    }
    closedir($handle);
}
if($i%2 == 1){
	echo "</div>";
}
?>
</div>
