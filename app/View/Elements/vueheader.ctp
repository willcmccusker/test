<<<<<<< HEAD
<head><link href="/vue/static/css/app.f3e144034e4b47ac4a58439d8eb807d8.css" rel="stylesheet"></head>
=======
<head><link href="/vue/static/css/app.b2ecab63c704681317828c3d9785b41a.css" rel="stylesheet"></head>
>>>>>>> phaseII
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.12196680581093fb0459.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.7ab426892af46aa619ce.js"></script>