<?php

// Common script to include to get things rolling
define('COMMON_INCLUDED', 1);

if (!defined('BASE_DIR'))
	define('BASE_DIR', './');

// Load site config
require BASE_DIR.'config.php';

if ($config['allow_debug_mode'] && isset($_GET['debug']) && $_GET['debug'])
	$config['debug_mode'] = true;

if ($config['debug_mode']) {
	$debug['start'] = microtime(true);
	error_reporting(E_ALL);
	function shutdown()
	{
		global $debug;
		echo '<div class="container" style="color: #666; margin-top: 20px;">Page generation time: ', microtime(true)-$debug['start'], ' seconds</div>';
	}
	register_shutdown_function('shutdown');
}

// Autoload classes
function __autoload($class_name) {
    include BASE_DIR.'class/'.$class_name.'.php';
}

// Load the template engine
$page = new Mu();

// Add standard data to template view
$page->addView(array(
	'page_head' => array(
		'title' => 'Test',
		'url_prefix' => $config['url_prefix']
	),
	'debug_mode' => $config['debug_mode']
));
