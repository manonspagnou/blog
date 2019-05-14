<?php

	$id=$_GET['postId'];

	// Appel de la connexion PDO
	include 'class/PostModel.php';
	include 'class/CommentModel.php';

	// On teste le résultat
	//var_dump($post);

	// Pour savoir si le formulaire d'ajout de commentaire a bien été soumis, on regarde si la variable superglobale $_POST n'est pas vide
	$nickname = ($_POST['nickname']);
	$content = ($_POST['content']);
	$postId = ($_POST['postId']);
	
	$commentModel = new CommentModel;
	$comments = $commentModel->addComment($nickname, $content, $postId);

	header ('Location: article.php?postId='.$id);