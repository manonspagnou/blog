<?php
	
	include 'class/UserSession.php';

	$id=$_GET['postId'];

	// Appel de la connexion PDO

	include 'class/PostModel.php';
	include 'class/CommentModel.php';

	$postModel = new PostModel;
	$post = $postModel->getOnePost($id);

	// On teste le résultat
	//var_dump($post);

	// Afficher les commentaires

	$commentModel = new CommentModel;
	$comments = $commentModel->getCommentsByPostId($id);

	//var_dump($comments);

	// Inclure la page article.phtml;
	$page = 'article';
	include 'views/layout.phtml';