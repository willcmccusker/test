<? $this->assign('title', "Ciudades");?>

<div id='cityList'  class='grid wide'>
		<div class='citites-title'>Ciudades</div>
			<!-- <input class="search" placeholder="Search" /> -->

		<!-- 	<button class="sort" data-sort="city">
				Sort by city
			</button>  

			<button class="sort" data-sort="region">
				Sort by region
			</button> -->
<!-- 			<div class='list grid'> -->
			<!-- <div class='col-1-3 tab-1-2 mob-1-1'> -->
		<?
		usort($cities, function($a, $b) {
            if($a["Region"]["name"] == $b["Region"]["name"]){
                if($a["City"]["country"] == $b["City"]["country"]){
                    return strcasecmp($a["City"]["name"], $b["City"]["name"]);
                }else{
                    return strcasecmp($a["City"]["country"], $b["City"]["country"]);
                }
            }else{
                return strcasecmp($a["Region"]["name"], $b["Region"]["name"]);
            }
        });

    	$list = $cities;
    	$p = 3;
	    $listlen = count($list);
	    $partlen = floor($listlen / $p);
	    $partrem = $listlen % $p;
	    $partition = array();
	    $mark = 0;
	    for($px = 0; $px < $p; $px ++) {
	        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
	        $partition[$px] = array_slice($list, $mark, $incr);
	        $mark += $incr;
	    }
	    $citiesGroup =  $partition;
		
		$region = false;
		$i = 0;

		foreach($citiesGroup as $cities):
?>
	<ul class='list col-1-3 tab-1-1'>
<?
		foreach($cities as $city):
			if($region != $city["Region"]["name"]){
				$newRegion = true;
				// echo $i == 2  || $i == 5 ? "</div>" : "";
				// echo $i == 2 ? "<div class='col-1-3 tab-1-2 mob-1-1'>" : ($i == 5 ? "<div class='col-1-3 tab-1-1 mob-1-1'>" : "");
				$i++;
				$region = $city["Region"]["name"];
			}else{
				$newRegion = false;
			}
			?>

			<div class='region-<?=$i;?>'>
				<div class='display-none country'><?=$city["City"]["country"];?></div> 
				<?if($newRegion):?><h3 class='region '><?=$region;?></h3><?endif;?>
				<div class='city'>
					<a href='/cities/view/<?=$city["City"]["slug"];?>'>
						<?=$city["City"]["name"];?> <span class='country-dash'>—</span> <span class='country-name'><?=$city["City"]["country"];?></span>
					</a>
				</div>
			</div>

		<?endforeach;?>
		</ul>
		<?endforeach;?>
<!-- 			</div> -->

</div>
