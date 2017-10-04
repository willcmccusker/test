<head><link href="/vue/static/css/app.c6bb7ab374cb9faa7742fd031243bd74.css" rel="stylesheet"></head>
<?
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.firstVisit = <?= isset($firstVisit) && $firstVisit ? 'true' : 'false';?>;
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.b8bc2dd53043f9cd432c.js"></script><script type="text/javascript" src="/vue/static/js/vendor.a0842d6b71488cc80ca0.js"></script><script type="text/javascript" src="/vue/static/js/app.ebba2098626dffc20a98.js"></script>