<head><link href="/vue/static/css/app.3cf3c9b4652d772af80dbae42f2d298c.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.d0a59cea3e0a1f0a2b60.js"></script><script type="text/javascript" src="/vue/static/js/vendor.ecf4b40302cfedf7b48f.js"></script><script type="text/javascript" src="/vue/static/js/app.ec84acf03f3cd39f2718.js"></script>