Admin page<br />
<?php

if ($F->url[1] == 'install') {
	echo 'Installing:<br />';
	$classes = scandir(BASE_DIR.'class');
	foreach ($classes as $class) {
		if (substr($class, 0, 1) === '.')
			continue;
			
		$class = substr($class, 0, -4);

		if (in_array('FInstallable', class_implements($class))) {
			echo $class.': '.call_user_func($class.'::install').'<br />';
			
		}
	}
}