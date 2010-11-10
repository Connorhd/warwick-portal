<?php

// Common script to include to get things rolling

if (!defined('BASE_DIR'))
	define('BASE_DIR', './');

// Autoload classes
function __autoload($class_name) {
    include BASE_DIR.'class/'.$class_name.'.php';
}
