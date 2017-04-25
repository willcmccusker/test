<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
  Router::parseExtensions('png');
	Router::connect('/', array('controller' => 'cities', 'action' => 'map'));
  
	Router::connect('/data', array('controller' => 'cities', 'action' => 'index', 'data'));

  Router::connect('/sobre-nosotros', array('controller' => 'texts', 'action' => 'display', 'about'));
  Router::connect('/about', array('controller' => 'texts', 'action' => 'display', 'about'));

  Router::connect('/acknowledgements', array('controller' => 'texts', 'action' => 'display', 'acknowledgements'));

  Router::connect('/historical-data', array('controller' => 'texts', 'action' => 'display',  'historic_data'));

  // Router::connect('/rankings', array('controller' => 'texts', 'action' => 'display',  'rankings'));

  Router::connect('/autores', array('controller' => 'texts', 'action' => 'display',  'team'));
  Router::connect('/team', array('controller' => 'texts', 'action' => 'display',  'team'));

  Router::connect('/methodology', array('controller' => 'texts', 'action' => 'display',  'methodology'));

  Router::connect(
    '/tiles/show/:city/:map/:layer/:z/:x/:y',
    array('controller' => 'tiles', 'action' => 'show'),
    array(
      'city' => '\w+',
      'map' => '\w+',
      'layer' => '\w+',
      'z' => '\d+',
      'x' => '\d+',
      'y' => '\d+',
      'ext' => 'png'
    )
  );

	Router::connect('/login', array('controller' => 'users', 'action' => 'login', 'admin'=>true));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout', 'admin'=>true));
	Router::connect('/admin', array('controller' => 'cities', 'action' => 'index', 'admin'=>true));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));



/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
