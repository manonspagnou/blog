<?php

include 'UserModel.php';
include 'UserSession.php';
include 'FlashBag.php';

class SignupController {

	public function index() {

		$email = '';
		$firstname = '';
		$lastname = '';
		$birthdate = '';
		$adress = '';
		$zipcode = '';
		$city = '';
		$gender = '';

		if(!empty($_POST)){
			// On récupère les infos du formulaire ...
			$email = $_POST['email'];
			$password = $_POST['password'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$birthdate = $_POST['birthdate'];
			$adress = $_POST['adress'];
			$zipcode = $_POST['zipcode'];
			$city = $_POST['city'];
			$gender = $_POST['gender'];

			$userModel = new UserModel();
			
			// Vérification email existe ?
			try {
				$emailExists = $userModel->addUser($email, $password, $firstname, $lastname, $birthdate, $adress, $zipcode, $city, $gender); 
				// Redirection vers accueil
				header ('Location: index.php'); 
				exit;
			}
			catch (Exception $e){
				$error = $e->getMessage();
			}
		}
		$page = 'signup_form';
		include 'views/layout.phtml';
	}
}