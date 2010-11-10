<?php

require 'include/common.php';

$mu = new Mu();

echo $mu->renderTpl('index', array('planet' => 'World'));
