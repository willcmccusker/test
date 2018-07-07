<head><link href="/vue/static/css/app.4c248ef42df0b07f84eeab193248d52d.css" rel="stylesheet"></head>
<?
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.firstVisit = <?= isset($firstVisit) && $firstVisit ? 'true' : 'false';?>;
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.e8a2b01dab9c6176fe60.js"></script><script type="text/javascript" src="/vue/static/js/vendor.a1f7bb944ce3e3b1a794.js"></script><script type="text/javascript" src="/vue/static/js/app.f0e09984d5e16cc9dd96.js"></script>