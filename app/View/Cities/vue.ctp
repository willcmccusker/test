<head><link href="/vue/static/css/app.df3ab92f326788c8e4ab7cfe9983354c.css" rel="stylesheet"></head>
<? $this->assign('title', $city["City"]["name"]);?>
<script>
  var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
  var cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="header"></div>
<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.f6a8bef5efd02a0930c8.js"></script><script type="text/javascript" src="/vue/static/js/vendor.0808802115082d9cc478.js"></script><script type="text/javascript" src="/vue/static/js/app.e78523967c1e1ee07a7c.js"></script>