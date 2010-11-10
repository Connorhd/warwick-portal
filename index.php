<?php

define('BASE_DIR', './');
require BASE_DIR.'common.php';

$url = substr($_SERVER["REQUEST_URI"], strlen($config['url_prefix'])+1);
if (strpos($url, '?') !== false) {
	$url = substr($url, 0, strpos($url, '?'));
}
$url = explode('/', $url);

// TODO: Custom urls (regex?)

$depth = 0;
$path = 'page/';

while ($depth < (count($url) - 1)) {
	if (is_dir(BASE_DIR.$path.$url[$depth]))
		$path .= $url[$depth].'/';
	else 
		break;

	$depth++;
}

if (strlen($url[$depth]) > 0 && is_file(BASE_DIR.$path.$url[$depth].'.php')) {
	require BASE_DIR.$path.$url[$depth].'.php';
} else if (is_file(BASE_DIR.$path.$url[$depth].'/index.php')) {
	require BASE_DIR.$path.$url[$depth].'/index.php';
} else {
	// TODO: nice 404 handler
	exit('404');
}
