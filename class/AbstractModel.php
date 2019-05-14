<?php

include_once 'Database.php';

abstract class AbstractModel {
	protected $db;

	public function __construct() {
		$this->db = new Database;
	}
}