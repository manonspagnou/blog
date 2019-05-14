<?php

include_once 'Database.php';
include_once 'AbstractModel.php';

class UserModel extends AbstractModel {

	// Ajouter un utilisateur, enregistrer ses infos dans la BDD
	function addUser($email, $password, $firstname, $lastname, $birthdate, $adress, $zipcode, $city, $gender) {

		// Vérifier que l'email n'existe pas
		$sql='SELECT Id FROM User WHERE Email = ?';

		$user = $this->db->queryOne($sql, [$email]);

		if (!empty($user)) {
			throw new Exception('Cet email existe déjà');
		}
		// Si l'email existe, on lance une exception
		
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$sql='INSERT INTO User(Email, Password, Firstname, Lastname, Birthdate, Adress, Zipcode, City, Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

		$this->db->queryAction($sql, [$email, $hashedPassword, $firstname, $lastname, $birthdate, $adress, $zipcode, $city, $gender]);
	}

	// Vérifier les infos rentrées à la connection, l'adresse mail existe ? Le mot de passe correspond ?
	function checkUser($email, $password) {

		$sql='	SELECT Id, Email, Password, Firstname, Lastname 
				FROM User 
				WHERE Email = ?';

		// Le $email remplace le ? de la requête sql
		$user = $this->db->queryOne($sql,[$email]);

		// On vérifie le password
		if (!empty($user)) {

			// return $user;
			if (password_verify($password, $user['Password'])) {
				return $user;
			}
		}
		throw new Exception('Identifiants incorrects');
	}
}