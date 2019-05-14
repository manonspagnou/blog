<?php
	
	include 'autoload.php';
	// include 'class/PostModel.php';
	// include_once 'class/UserSession.php';
	// include 'class/FlashBag.php';
	include 'class/HomeController.php';
	include 'class/PostController.php';
	include 'class/SigninController.php';
	include 'class/SignupController.php';
	include 'class/CommentModel.php';

	// On initialise la variable pour lui donner une valeur pas défault
	$page = 'home';
	// On regarde si la clé 'p' est vide ou non
	if(array_key_exists('p', $_GET) && isset($_GET['p'])) {
		// On récupère le paramètre 'p' de la page
		$page = $_GET['p'];
	}
	// var_dump($page);

	switch($page) {
		case 'home':
			$controller = new HomeController;
			$controller->index();
			break;

		case 'post':
			$controller = new PostController;
			$id = $_GET['postId'];
			$controller->index($id);
			break;

		case 'addComment';
			$controller = new PostController;
			$controller->addComment();
			break;

		case 'signin':
			$controller = new SigninController;
			if(!empty($_POST)) {
				$controller->signin();
			}else{
				$controller->showForm();
			}
			break;

		/*case 'signup':
			$controller = new SignupController;
			$controller->//();*/

			break;
		default:
			echo "La page demandée est introuvable";
	}