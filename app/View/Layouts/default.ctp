<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Atlas de Expansión Urbana Colombia - <?php echo $this->fetch('title'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0, maximum-scale=1, height=device-height, target-densitydpi=device-dpi">

	<?echo $this->fetch('meta');?>
	<meta name="description" content=""></head>
	<meta name="keywords" content=""></head>
	<meta property="og:site_name" content="" />
	<meta property="og:url" content="" />
	<meta property="og:description" content="" />
	
<?
		echo $this->Html->css('/dist/css/style.css');
		echo $this->Html->script('/dist/js/app.min.js');
?>

<?if(isset($fbphoto)):?>
	<meta property="og:image" content="<?=$fbphoto;?>" />
<?endif;?>

</head>
<body class='<?= Inflector::slug($this->request->url) == "" ? "map" : Inflector::slug($this->request->url)?>'>
	<?
	echo $this->element("vueheader");
	echo $this->fetch('content');
	echo $this->params->action == "display" ? $this->element("footer") : '';
	//echo $this->element('sql_dump'); 

	echo $this->Html->css('/mapbox.js/mapbox.css');
	echo $this->Html->script('/mapbox.js/mapbox.js');
	?>
	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
	<script>
  L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og'


	setTimeout(function(){
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-85794401-1', 'auto');
	ga('send', 'pageview');
	},500);
	</script>
</body>
</html>
