<?php

$modules = Module::listModules();

foreach ($modules as $key => $module) {
	$modules[$key] = array_merge($module, array('capitalCode' => strtoupper($module['code'])));
}

// Add data
$F->template->addView(array('module' => $modules));

// Render page
echo $F->template->renderTpl('module/index');
