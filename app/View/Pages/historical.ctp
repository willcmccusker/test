<div class=' historical'>
<?php
$path = APP . "webroot/file-manager/userfiles/data_page/Animations/";

if ($handle = opendir($path)) {
	$i=0;
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;
        if($i%2 == 0){

        	$video = '<video controls preload="none" poster="/file-manager/userfiles/data_page/Animations/'.str_replace(".mp4", ".jpg", $file).'">
				<source src="/file-manager/userfiles/data_page/Animations/$file;" type="video/mp4">
			</video>';


        	?>
	<div class='grid'>
		<div class='col-1-5'></div>
		<div class='col-2-5'>
		<?=$file;?>
		<?=$video;?>
		</div>
    	<?}elseif($i%2 == 1){?>
			<div class='col-2-5'>
			<?=$file;?>
			<?=$video;?>
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