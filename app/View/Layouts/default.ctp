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
	<title>Atlas of Urban Expansion - <?php echo $this->fetch('title'); ?></title>

 	<?php
		// echo $this->Html->meta('icon');


?>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0, maximum-scale=1, height=device-height, target-densitydpi=device-dpi">

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><script type="text/javascript">google.charts.load('current', {packages: ['corechart']});google.charts.setOnLoadCallback(googleChartsReady);</script> -->
<?
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
	<style>
		body{
			opacity:0;
		}
		.header-bg{
		    -webkit-transition: filter 1000ms ease;
		    -moz-transition: filter 1000ms ease;
		    -ms-transition: filter 1000ms ease;
		    transition: filter 1000ms ease;
		    transition: -webkit-filter 1000ms ease;
		}
		.cityHeader .header-bg.lazyimg {
		    -webkit-filter: blur(5px);
		    -moz-filter: blur(5px);
		    -ms-filter: blur(5px);
		    filter: blur(5px);
		}
	</style>
	<meta name="description" content=""></head>
	<meta name="keywords" content=""></head>
	<meta property="og:site_name" content="" />
	<meta property="og:url" content="" />
	<meta property="og:description" content="" />

<?if(isset($fbphoto)):?>
	<meta property="og:image" content="<?=$fbphoto;?>" />
<?endif;?>
</head>
<body>
<img class='loader' src="/img/loader.svg">
<?
	echo $this->element("header");
	echo $this->fetch('content');
	echo $this->element("footer");
	//echo $this->element('sql_dump'); ?>
	<style>
	<? 		
// 	echo file_get_contents(APP . 'webroot/dist/css/style.css');
// 	echo file_get_contents(APP . 'webroot/mapbox.js/mapbox.css');
	
	?>
    </style>



	<?
	echo $this->Html->css('/dist/css/style.css');
	echo $this->Html->css('/mapbox.js/mapbox.css');
		echo $this->Html->script('/mapbox.js/mapbox.js');
		echo $this->Html->script('/dist/js/app.min.js');
	?>
	       <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
