<head><link href="/vue/static/css/app.0d181fcc9320c5831e97863611683120.css" rel="stylesheet"></head>
<?
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.firstVisit = <?= isset($firstVisit) && $firstVisit ? 'true' : 'false';?>;
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.39f5f82e7bbe9abec8f2.js"></script><script type="text/javascript" src="/vue/static/js/vendor.a0842d6b71488cc80ca0.js"></script><script type="text/javascript" src="/vue/static/js/app.341c16b75a39163a525b.js"></script>