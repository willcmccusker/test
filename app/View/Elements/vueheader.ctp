<head><link href="/vue/static/css/app.d10076b337d28ae658e817da29694b2f.css" rel="stylesheet"></head>
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<<<<<<< HEAD
<script type="text/javascript" src="/vue/static/js/manifest.9efc7b098e1cd4b9de17.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.14b4b1426466f2ba9432.js"></script>
=======
<script type="text/javascript" src="/vue/static/js/manifest.a70219d75aa530f6305c.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.71455460165610baaed2.js"></script>
>>>>>>> phaseII
