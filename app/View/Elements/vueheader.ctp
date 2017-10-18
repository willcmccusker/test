<head><link href="/vue/static/css/app.f9b7dfe424aefad664ce9398f648346b.css" rel="stylesheet"></head>
<?
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.firstVisit = <?= isset($firstVisit) && $firstVisit ? 'true' : 'false';?>;
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.0dbbe3d8b4be6e69dea1.js"></script><script type="text/javascript" src="/vue/static/js/vendor.a0842d6b71488cc80ca0.js"></script><script type="text/javascript" src="/vue/static/js/app.827669265315e043ce1d.js"></script>