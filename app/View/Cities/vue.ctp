<head><link href="/vue/static/css/app.8df39785da7bab4da4754a5b412d3154.css" rel="stylesheet"></head>
<? $this->assign('title', $city["City"]["name"]);?>
<script>
  var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
  var cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="header"></div>
<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.31138bac5c0cc4dbcbb6.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.109dc36649cb918a11b2.js"></script>