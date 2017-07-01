<head><link href="/vue/static/css/app.089b916511293f272ea81ee4eb2d1507.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.9a64b4dc13f2942abc73.js"></script><script type="text/javascript" src="/vue/static/js/vendor.ecf4b40302cfedf7b48f.js"></script><script type="text/javascript" src="/vue/static/js/app.8d7c865f528567aa6bde.js"></script>