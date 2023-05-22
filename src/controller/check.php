<?php

function password_pattern($mdp) {
	$majuscule = preg_match('@[A-Z]@', $mdp);
	$special = preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $mdp);
	$minuscule = preg_match('@[a-z]@', $mdp);
	$chiffre = preg_match('@[0-9]@', $mdp);
	switch($mdp) {
		case strlen($mdp) < 8:
			$message = "8 caractères minimum";
			echo $message;
			break;
		case !$majuscule:
			$message = "majuscule";
			echo $message;
			break;
		case !$minuscule:
			$message = "minuscule";
			echo $message;
			break;
		case !$chiffre:
			$message = "chiffre";
			echo $message;
			break;
		case !$special:
			$message = "caractère spécial";
			echo $message;
			break;
		case !$majuscule || !$minuscule || !$chiffre || strlen($mdp) >= 8:
			echo "ok";
			break;
	}
}

if(isset($_GET['password'])) {
	$password = $_GET['password'];
	password_pattern($password);
}