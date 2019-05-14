<?php

class SigninController {

	function showForm() {
		$page = 'signin_form';
		include 'views/layout.phtml';
	}

	function signin() {

		$email ='';

		// Traitement des données du formulaire
		$email = $_POST['email']; // On récupère les infos du formulaire ...
		$password = $_POST['password'];
		// On crée de nouveaux objets pour appeler les fonctions (checkUser() et createUserSession())
		$userModel = new UserModel();
		$userSession = new UserSession();
		
		try {
			// Vérification email existe et mot de passe correspond ?
			$user = $userModel->checkUser($email,$password);
			// User en session
			$user = $userSession->createUserSession($user['Id'], $user['email'], $user['firstname'], $user['lastname']);

			//Créer et ajouter un message flash lors de la connection de l'utilisateur
			$fb = new FlashBag;
			$fb->add('Vous êtes connecté.');

			// Redirection vers accueil
			header ('Location: index.php'); 
			exit;
		}
		catch (Exception $e){
			$error = $e->getMessage();
			
			$page = 'signin_form';
			include 'views/layout.phtml';
		}
	}
}