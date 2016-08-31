<script> var cities = <?= json_encode($cities);?>; console.log(cities);</script>
<?
$region = false;
foreach($cities as $city){
	if($region != $city["Region"]["name"]){
		echo "<h3 class='cityheader'>".$city["Region"]["name"]."</h3>";
		$region = $city["Region"]["name"];
	}
	echo "<div class='citylist'>".$city["City"]["name"]." — ".$city["City"]["country"]."</div>";
}
// debug($cities);
?>