<!-- htmlmin:ignore -->
<? $this->assign('title', $city["City"]["name"]);?>
<script>
  var city = <?= json_encode($city, JSON_NUMERIC_CHECK);?>;
  var cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>
<!-- htmlmin:ignore -->
<div id="header"></div>
<div id="app"></div>
<!-- built files will be auto injected -->