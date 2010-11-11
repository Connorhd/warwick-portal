<?php

if (!defined('COMMON_INCLUDED'))
	exit('Error');
	
// Config stuff here
$F->config = array(
	'url_prefix' => 'warwick-portal/',
	// Force debug mode on
	'debug_mode' => false,
	// Allow ?debug=1 for debug mode
	'allow_debug_mode' => true
);