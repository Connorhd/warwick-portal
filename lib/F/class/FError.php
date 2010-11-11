<?php

class FError {
	// Our function for rendering templates
	public function fatal($error) {
		global $F;
		ob_end_clean();
		ob_start();
		if ($F->config['debug_mode']) {
			die($error);
		} else {
			die("Fatal error");
		}
	}
}
