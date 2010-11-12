<?php

// URL hander
$url = substr($_SERVER["REQUEST_URI"], strlen($F->config['url_prefix'])+1);
if (strpos($url, '?') !== false) {
	$url = substr($url, 0, strpos($url, '?'));
}
$F->url = explode('/', $url);

// TODO: Custom urls (regex?)

// Admin is a special case
if ($F->url[0] === 'admin') {
	require BASE_DIR.'lib/F/admin.php';
} else {
	$depth = 0;
	$path = 'page/';

	while ($depth < (count($F->url) - 1)) {
		if (is_dir(BASE_DIR.$path.$F->url[$depth]))
			$path .= $F->url[$depth].'/';
		else 
			break;

		$depth++;
	}

	if (strlen($F->url[$depth]) > 0 && is_file(BASE_DIR.$path.$F->url[$depth].'.php')) {
		require BASE_DIR.$path.$F->url[$depth].'.php';
	} else if (is_file(BASE_DIR.$path.$F->url[$depth].'/index.php')) {
		require BASE_DIR.$path.$F->url[$depth].'/index.php';
	} else {
		// TODO: nice 404 handler
		exit('404');
	}
}