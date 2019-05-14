<?php

class UserSession {

	function __construct() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}

	function isAuthentificated() {
		if (array_key_exists('user', $_SESSION) && isset($_SESSION['user'])) {
			return true;
		}
		return false;
	}

	function getUserName() {
		if ($this->isAuthentificated()) {
			return $_SESSION['user']['Firstname'] . ' ' . $_SESSION['user']['Lastname'];
		}
		return null;
	}

	function createUserSession($userId, $email, $firstname, $lastname) {
		$_SESSION['user'] = [
			'Id' => $userId,
			'Email' => $email,
			'Firstname' => $firstname,
			'Lastname' => $lastname
		];
	}

	function signOut() {
		$_SESSION['user'] = [];
		session_destroy();
	}
}