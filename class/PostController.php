<?php

class PostController {

	public function index($id) {

		// var_dump($id);

		$postModel = new PostModel;
		$post = $postModel->getOnePost($id);

		//var_dump($post);

		// Afficher les commentaires
		$commentModel = new CommentModel;
		$comments = $commentModel->getCommentsByPostId($id);

		// var_dump($comments);

		// Inclure la page article.phtml;
		$page = 'article';
		include 'views/layout.phtml';
	}

	function addComment() {
		$id=$_GET['postId'];

		// Pour savoir si le formulaire d'ajout de commentaire a bien été soumis, on regarde si la variable superglobale $_POST n'est pas vide
		$nickname = ($_POST['nickname']);
		$content = ($_POST['content']);

		$commentModel = new CommentModel;
		$commentModel->addComment($nickname, $content, $id);

		header ('Location: index.php?p=post&postId='.$id);
	}
}