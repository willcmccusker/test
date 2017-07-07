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

$cakeDescription = __d('cake_dev', 'Atlas');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('admin');
		echo $this->Html->css('bootstrap3.min');
		echo $this->Html->css('/summernote/summernote');
		// echo $this->Html->css('bootstrap-responsive.min'); 

		echo $this->Html->script('jquery-3.1.0.min');
		echo $this->Html->script('bootstrap3.min');
		echo $this->Html->script('/summernote/summernote.min');
		echo $this->Html->script("admin.js");

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link("Atlas de Expansión Urbana Colombia", '/'); ?></h1>
		</div>
		<div id="content">
		<? if($this->Session->read('Auth.User')): ?>
			<div id='file-manager'>Open File Manager</div>
		<? endif;?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<?php 
	// echo $this->element('sql_dump'); ?>
</body>
</html>
