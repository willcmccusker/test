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
	<title><?php echo $this->fetch('title'); ?></title>

	<script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />

 	<?php
		// echo $this->Html->meta('icon');

	echo $this->Html->script('/dist/js/app.min.js');
	//echo $this->Html->script('/src/js/leaflet.min.js');
		echo $this->Html->css('/dist/css/style.css');

?>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><script type="text/javascript">google.charts.load('current', {packages: ['corechart']});google.charts.setOnLoadCallback(googleChartsReady);</script> -->
<?
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
</head>
<body style="opacity:0;"><?
	echo $this->element("header");
	echo $this->fetch('content');
	echo $this->element("footer");
	//echo $this->element('sql_dump'); ?>
	<?
		echo $this->Html->css('/dist/css/style.css');
		echo $this->Html->css('leaflet');
	?>
</body>
</html>
