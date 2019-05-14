<?php

// include_once 'UserSession.php';
include_once 'Database.php';
include_once 'AbstractModel.php';

class PostModel extends AbstractModel {

	// Fonctions qui manipulent et gèrent les articles
	function getAllPosts() {

		// Création de la première requête SQL
		$sql = 'SELECT Post.Id, Title, CreatedAt, Image, Content, Name
				FROM Post
				INNER JOIN Category
				ON Post.CategoryId = Category.Id
				ORDER BY CreatedAt DESC';

		// FETCH_ASSOC -> permet de définir un affichage particulier, retire le doublon du tableau
		$posts = $this->db->queryAll($sql);
		return $posts;

		// On vérifie le résultat
		// var_dump($posts);
	}

	function getOnePost($id) {

		// Création de la première requête SQL
		$sql = 'SELECT Post.Id, Title, CreatedAt, Image, Content, Name
				FROM Post
				INNER JOIN Category
				ON Post.CategoryId = Category.Id
				WHERE Post.Id = ?
				ORDER BY CreatedAt DESC';
		return $this->db->queryOne($sql, [$id]);
	}
}