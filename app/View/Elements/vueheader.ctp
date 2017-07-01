<head><link href="/vue/static/css/app.fb34fd1aac05ceb93ed433bf5a0d8cf5.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<script type="text/javascript" src="/vue/static/js/manifest.41ada86fb95bcb7b867b.js"></script><script type="text/javascript" src="/vue/static/js/vendor.ecf4b40302cfedf7b48f.js"></script><script type="text/javascript" src="/vue/static/js/app.cb35022fc34a9411f874.js"></script>