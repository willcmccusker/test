<script>
var city = <?= json_encode($city);?>;
</script>
chartist:
<div id="density_change-chartist"  class="ct-chart ct-perfect-fourth"></div>
plotly:
<div id="density_change-plotly" ></div>
google:
<div id="density_change-googleChart"></div>
<div id="density_line-googleChart"></div>
plottable:
<svg id='density_change-plottable'></svg>
chart.js:
<div class='holder'><canvas id="density_change-chartjs" ></canvas></div>
 <? 
// debug($city);?>