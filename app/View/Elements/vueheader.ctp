<head><link href="/vue/static/css/app.d672ec73e5094311a27201afdbd9c212.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.48246baf651e9b85fbd2.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.eebf77f75a1b40271438.js"></script>