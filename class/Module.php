<?php

// Class to handle modules
class Module implements FInstallable {
	public static function install() {
		return 'Install successful';
	}

	// Attempt to find a module code in a string
	public static function normaliseName($name) {
		return strtolower($name);
	}
}