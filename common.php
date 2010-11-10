<?php

error_reporting(E_ALL);

// Common script to include to get things rolling
define('COMMON_INCLUDED', 1);

if (!defined('BASE_DIR'))
	define('BASE_DIR', './');

// Load site config
require BASE_DIR.'config.php';

// Autoload classes
function __autoload($class_name) {
    include BASE_DIR.'class/'.$class_name.'.php';
}

// Load the template engine
$page = new Mu();

// Add standard data to template view
$page->addView(array(
	'title' => 'Test',
	'config' => $config
));
