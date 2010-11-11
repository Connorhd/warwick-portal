<?php

// Add data
$F->template->addView(array('planet' => 'World'));

// Render page
echo $F->template->renderTpl('index');