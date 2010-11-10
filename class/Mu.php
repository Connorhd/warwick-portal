<?php

require(BASE_DIR.'lib/mustache.php/Mustache.php');

class Mu extends Mustache {
	public function renderTpl($tpl, $data) {
		return $this->render(file_get_contents(BASE_DIR.'template/'.$tpl.'.mu'), $data);
	}
}
