<?php

function password_pattern($mdp) {
	$majuscule = preg_match('@[A-Z]@', $mdp); // Vérifie s'il y a une lettre majuscule dans le mot de passe
	$special = preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $mdp); // Vérifie s'il y a un caractère spécial dans le mot de passe
	$minuscule = preg_match('@[a-z]@', $mdp); // Vérifie s'il y a une lettre minuscule dans le mot de passe
	$chiffre = preg_match('@[0-9]@', $mdp); // Vérifie s'il y a un chiffre dans le mot de passe

	switch($mdp) {
		case strlen($mdp) < 8: // Vérifie si la longueur du mot de passe est inférieure à 8
			$message = "8 caractères minimum";
			echo $message;
			break;
		case !$majuscule: // Vérifie si le mot de passe ne contient pas de lettre majuscule
			$message = "majuscule";
			echo $message;
			break;
		case !$minuscule: // Vérifie si le mot de passe ne contient pas de lettre minuscule
			$message = "minuscule";
			echo $message;
			break;
		case !$chiffre: // Vérifie si le mot de passe ne contient pas de chiffre
			$message = "chiffre";
			echo $message;
			break;
		case !$special: // Vérifie si le mot de passe ne contient pas de caractère spécial
			$message = "caractère spécial";
			echo $message;
			break;
		case !$majuscule || !$minuscule || !$chiffre || strlen($mdp) >= 8: // Vérifie si le mot de passe respecte toutes les conditions
			echo "ok";
			break;
	}
}

if(isset($_GET['password'])) {
	$password = $_GET['password'];
	password_pattern($password); // Appelle la fonction pour vérifier le mot de passe
}
