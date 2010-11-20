<?php

if (isset($_POST['submit'])) {
	Module::add($_POST['code'], $_POST['name']);

	$F->template->addView(array('added' => true));
}

echo $F->template->renderTpl('module/add');
