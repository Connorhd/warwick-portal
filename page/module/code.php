<?php

if (!isset($F->url[2])) {
	$F->error->fatal('Needs more module code');
}

$module = new Module($F->url[2]);

// Add data
$F->template->addView($module->data);

// Render page
echo $F->template->renderTpl('module/code');
