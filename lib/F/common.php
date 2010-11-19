<?php

// Common script to include to get things rolling
define('COMMON_INCLUDED', 1);

if (!defined('BASE_DIR'))
	define('BASE_DIR', './');
	
// Empty object to hold framework stuff
$F = new stdClass();

// Load site config
require BASE_DIR.'config.php';

if ($F->config['allow_debug_mode'] && isset($_GET['debug']) && $_GET['debug'])
	$F->config['debug_mode'] = true;

if ($F->config['debug_mode']) {
	$F->debug = array();
	$F->debug['start'] = microtime(true);
	error_reporting(E_ALL);
	function shutdown_debug() {
		global $F;
		echo '<div class="container" style="color: #666; margin-top: 20px;">Page generation time: ', microtime(true)-$F->debug['start'], ' seconds</div>';
	}
	register_shutdown_function('shutdown_debug');
}

// Output buffering
ob_start();
function shutdown_output() {
	ob_end_flush();
}
register_shutdown_function('shutdown_output');

// Autoload classes
function __autoload($class_name) {
	global $F;
	if (substr($class_name, 0, 1) === 'F' && file_exists(BASE_DIR.'lib/F/class/'.$class_name.'.php'))
		require BASE_DIR.'lib/F/class/'.$class_name.'.php';
	else if (file_exists(BASE_DIR.'class/'.$class_name.'.php'))
		require BASE_DIR.'class/'.$class_name.'.php';
	else if (isset($F->error))
		$F->error->fatal('Cannot find class '.$class_name);
	else {
		@ob_end_clean();
		@ob_start();
		die('Cannot find class '.$class_name);
	}
}

// Load error handler
$F->error = new FError();

// Load the template engine
$F->template = new FTemplate();

// Connect to DB
$F->db = new FDb($F->config['db']['host'], $F->config['db']['user'], $F->config['db']['password'], $F->config['db']['database'], $F->config['db']['prefix']);

// Add standard data to template view
$F->template->addView(array(
	'page_head' => array(
		'title' => 'Warwick Portal',
		'url_prefix' => $F->config['url_prefix']
	),
	'url_prefix' => $F->config['url_prefix'],
	'debug_mode' => $F->config['debug_mode']
));
