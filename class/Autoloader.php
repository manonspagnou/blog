<?php

class Autoloader {

	static public function autoload($classe) {
		require 'class/' . $classe . '.php';
	}

	static public function register () {
		spl_autoload_register([__CLASS__, 'autoload']);
	}
}                                              