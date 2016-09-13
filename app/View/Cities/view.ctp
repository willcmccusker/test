<script>
var city = <?= json_encode($city);?>;
</script>
<div id="density_change-chartist"  class="ct-chart ct-perfect-fourth"></div>
<div id="density_change-plotly" ></div>
<div id="density_change-googleChart"></div>
<div id="density_line-googleChart"></div>
<svg id='density_change-plottable'></svg>
<div class='holder'><canvas id="density_change-chartjs" ></canvas></div>
 <? 
// debug($city);?>