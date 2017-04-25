<!-- htmlmin:ignore -->
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>
<!-- htmlmin:ignore -->
<div id="app"></div>
<!-- built files will be auto injected -->