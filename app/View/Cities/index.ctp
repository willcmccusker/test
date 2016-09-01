
<div id='cityList'>


  <input class="search" placeholder="Search" />
  <ul class='list'>
<?
$region = false;
$regions = array();
foreach($cities as $i=>$city){
	if($region != $city["Region"]["name"]){
		$region = $city["Region"]["name"];
		// if($i!=0){
		// 	echo "</span>";
		// }
		// echo "<span>";
		// echo "<li class='region'>".$city["Region"]["name"]."</li>";
	}
	echo "<li class='".$city["Region"]["slug"]."'>";
	echo "<h3 class='region '>".$region."</h3>";
	echo "<div class='city'><a href='/cities/view/".$city["City"]["slug"]."'>".$city["City"]["name"]." — ".$city["City"]["country"]."</a></div>";
	echo "</li>";
}
echo "</ul>";
?>
	
</ul>
</div>