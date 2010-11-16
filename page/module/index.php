<ul>
<?php

$modules = Module::listModules();

foreach ($modules as $module) {
	echo '<li><a href="./code/'.$module['code'].'">'.$module['name'].'</a></li>';
}

?>
</ul>
