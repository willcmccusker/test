<<<<<<< HEAD
<head><link href="/vue/static/css/app.b22d70ebe1dfa9327ca20ba0a4cf82a4.css" rel="stylesheet"></head>
=======
<head><link href="/vue/static/css/app.5372b50977dab5f9499e3ba09d6c9a09.css" rel="stylesheet"></head>
>>>>>>> phaseII
<? 
if (isset($city)) $this->assign('title', $city["City"]["name"]);
?>
<script>
  window.city = <?= isset($city) ? json_encode($city, JSON_NUMERIC_CHECK) : 'false';?>;
  window.cities = <?= json_encode($cities, JSON_NUMERIC_CHECK);?>;
</script>

<div id="app"></div>
<<<<<<< HEAD
<script type="text/javascript" src="/vue/static/js/manifest.280addb24ca887f2bc6a.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.22131521a5a0b73079a1.js"></script>
=======
<script type="text/javascript" src="/vue/static/js/manifest.e060eda67de71822f433.js"></script><script type="text/javascript" src="/vue/static/js/vendor.8347a385929223ef78e1.js"></script><script type="text/javascript" src="/vue/static/js/app.0bc8e803f6f30195b5c5.js"></script>
>>>>>>> phaseII
