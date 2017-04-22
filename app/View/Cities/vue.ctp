<head><link href="/vue/static/css/app.237dc2906886c1ce5644312d0bb5e192.css" rel="stylesheet"></head>
<? $this->assign('title', $city["City"]["name"]);?>
<script>
  var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
  var cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="header"></div>
<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.773c72dfc3fc9a3278d3.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.9513d0ca7a9c2a69e837.js"></script>