<?php

// Add data
$page->addView(array('planet' => 'World'));

// Render page
echo $page->renderTpl('index');