<head><link href="/vue/static/css/app.ef7925c9f59e6379e960e811dd685377.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.firstVisit = <?= isset($firstVisit) && $firstVisit ? 'true' : 'false';?>;
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.cdacd495955a2559c890.js"></script><script type="text/javascript" src="/vue/static/js/vendor.a0842d6b71488cc80ca0.js"></script><script type="text/javascript" src="/vue/static/js/app.311389c8d870f33068d0.js"></script>