<?php

// Class to handle modules
class Module implements FInstallable {
	public static function install() {
		global $F;
		if (!$F->db->table_exists($F->db->prefix.'module')) {
			$F->db->query('	CREATE TABLE IF NOT EXISTS `'.$F->db->prefix.'module` (
					  `code` varchar(10) NOT NULL,
					  `name` varchar(255) NOT NULL,
					  PRIMARY KEY  (`code`)
					) ENGINE=MyISAM');
			// Insert a module to get started
                        $F->db->query('INSERT INTO `'.$F->db->prefix.'module` (code, name) VALUES (\'cs118\', \'Programming for Computer Scientists\')');
		}
		return 'Install successful';
	}

	// Attempt to find a module code in a string
	public static function normaliseName($name) {
		return strtolower($name);
	}

	public static function listModules() {
		global $F;
		$result = $F->db->query('SELECT code, name FROM `'.$F->db->prefix.'module`');
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		$result->free();
		return $data;
	}

	public static function add($code, $name) {
		global $F;
		$code = Module::normaliseName($code);
		$F->db->query('INSERT INTO `'.$F->db->prefix.'module` (code, name) VALUES (\''.$F->db->escape($code).'\', \''.$F->db->escape($name).'\')');
	}


	public $data = array();
	public function __construct($code) {
		global $F;
		$code = $this->normaliseName($code);
		$result = $F->db->query('SELECT * FROM `'.$F->db->prefix.'module` WHERE code LIKE \''.$code.'\'');
		if ($result->num_rows !== 1) {
			$F->error->fatal('Module code fail');
		}
 		$this->data = $result->fetch_assoc();
		$result->free();
	}

}
