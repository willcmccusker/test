<? $this->assign('title', "Historical");?>

<div class='historical'>
<div class='grid wide'>
	<div class='col-2-3 tab-1-1'>
		<?= $text["Text"]["content"];?>
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