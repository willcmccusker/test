<head><link href="/vue/static/css/app.d07712d2a914b0789c670582442ba321.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.be2e48d4328ab61c99ef.js"></script><script type="text/javascript" src="/vue/static/js/vendor.ecf4b40302cfedf7b48f.js"></script><script type="text/javascript" src="/vue/static/js/app.29ba6ac296269488f94a.js"></script>