<head><link href="/vue/static/css/app.761a4370f898f3c190da0dc94b94e651.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.8aa3349c99598cc92dea.js"></script><script type="text/javascript" src="/vue/static/js/vendor.ecf4b40302cfedf7b48f.js"></script><script type="text/javascript" src="/vue/static/js/app.06fc84aa921c18d26474.js"></script>