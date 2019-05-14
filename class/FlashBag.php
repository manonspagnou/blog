<?php

class FlashBag {

	public function __construct() {
		// Démarre la session si besoin
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		// Initialise le tableau de messages à la clé 'flash-messages' de $_SESSION si besoin.
		if(!array_key_exists('flash-messages', $_SESSION) 
		|| !isset($_SESSION['flash-messages'])) {
			$_SESSION['flash-messages'] = [];
		}
	}

	// Ajoute un message au tableau de messages.
	public function add($message) {
		$_SESSION['flash-messages'][] = $message;
		// OU array_push($_SESSION['flash-messages'], $message);
	}

	// Retourne true s'il y a des messages, false sinon.
	public function hasMessages() {
		return !empty($_SESSION['flash-messages']);
	}
	
	// Récupère le message le plus ancien, le retourne et le supprime du FlashBag.
	public function fetch() {
		return array_shift($_SESSION['flash-messages']);
	}

	// Récupère tous les messages, les retourne et les supprime.
	public function fetchAll() {
     	// On récupère les messages du flashbag et on les stocke dans la variable $messages
		$message = $_SESSION['flash-messages'];
        // On réinitialise le flash
		$_SESSION['flash-messages'] = [];
		// On retourne les messages qu'on a mis de côté 
		return $message;
	}
}