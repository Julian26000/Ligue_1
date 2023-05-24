<?php

if (isset($_SESSION['UserInfo'])) {
    header("Location: index.php?page=userinfos"); // Redirige l'utilisateur vers la page /userinfos s'il est déjà connecté
} 

include('./src/model/GestionClub.php');
include('./src/model/Club.php');
include('./src/model/GestionUser.php');
include('./src/model/User.php');

$bdd = new GestionBDD();
$cnx = $bdd->connect(); // Établit la connexion à la base de données

$gclubs = new GestionClub($cnx); // Crée une instance du contrôleur de clubs
$clubs = $gclubs->getListClub(); // Récupère la liste des clubs

$userController = new GestionUser($cnx); // Crée une instance du contrôleur d'utilisateurs

function check_mdp_format($mdp) {
	$majuscule = preg_match('@[A-Z]@', $mdp); // Vérifie la présence d'au moins une lettre majuscule
	$minuscule = preg_match('@[a-z]@', $mdp); // Vérifie la présence d'au moins une lettre minuscule
	$chiffre = preg_match('@[0-9]@', $mdp); // Vérifie la présence d'au moins un chiffre
	
	if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8) // Vérifie si le mot de passe respecte les critères requis
	{
		return false;
	}
	return true;
}

function register_checks($newUser, $userController) {
	$username = $newUser->getMailUti(); // Récupère l'adresse e-mail de l'utilisateur
	$password = $newUser->getPasswordUti(); // Récupère le mot de passe de l'utilisateur

	$mainClass = 'class="control has-icons-left"'; // Classe CSS appliquée à l'élément HTML

	if ($userController->isAlreadyUsed($username)) { // Vérifie si l'adresse e-mail est déjà utilisée
		$statusMessage = "The mail ". $username . " is already registrated"; // Message d'erreur si l'adresse e-mail est déjà utilisée
		$class = "class = 'input is-danger has-background-danger font-bold'"; // Classe CSS pour un affichage d'erreur
		return (object) ['main' => $mainClass, 'statusMessage' => $statusMessage, 'style' => $class];
	}

	if (check_mdp_format($password)) { // Vérifie le format du mot de passe
		$newUser->setPasswordUti(password_hash($password, PASSWORD_DEFAULT)); // Hache le mot de passe et met à jour l'utilisateur
		$userController->register($newUser); // Enregistre le nouvel utilisateur dans la base de données
		$statusMessage = "Account Created !"; // Message de création de compte réussie
		$class = "class = 'input is-success has-background-success font-bold'"; // Classe CSS pour un affichage réussi
		sleep(0.5);
		$userController->auth_user($username, $password); // Authentifie automatiquement l'utilisateur
		header("Location: /profile"); // Redirige l'utilisateur vers la page /profile après la création du compte
	} else {
		$statusMessage = "Wrong password format !".password_hash($password, PASSWORD_DEFAULT); // Message d'erreur si le format du mot de passe est incorrect
		$class = "class = 'input is-danger has-background-danger font-bold'"; // Classe CSS pour un affichage d'erreur
	}
	return (object) ['main' => $mainClass, 'statusMessage' => $statusMessage, 'style' => $class];
}

$mainClass = 'class="control has-icons-left '; // Classe CSS appliquée à l'élément HTML
$status = (object) ['main' => $mainClass.'hidden"', 'statusMessage' => 'bot detected', 'style' => '']; // Statut par défaut

if (isset($_POST['submit'])) { // Vérifie si le formulaire a été soumis

	if($_REQUEST['verif'] != null) {
		$status = (object) ['main' => $mainClass.'"', 'statusMessage' => 'bot detected', 'style' => "class = 'input is-danger has-background-danger font-bold'"]; // Statut en cas de détection de bot
		return;
	} 
               
	$club = $_REQUEST['club']; // Récupère la valeur du champ 'club' du formulaire
	$nom = $_REQUEST['nom']; // Récupère la valeur du champ 'nom' du formulaire
	$prenom = $_REQUEST['prenom']; // Récupère la valeur du champ 'prenom' du formulaire
	$email = $_REQUEST['email']; // Récupère la valeur du champ 'email' du formulaire
	$password = $_REQUEST['password']; // Récupère la valeur du champ 'password' du formulaire
	$sexe = $_REQUEST['sexe']; // Récupère la valeur du champ 'sexe' du formulaire
	$image = $_FILES['photo']['name']; // Récupère le nom du fichier image

	define('TARGET', '/assets/avatar/');    // Répertoire cible pour les images

	if(isset($image) and !empty($image)){
		$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisées pour les images
		$extension  = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

		if(in_array(strtolower($extension),$tabExt)){
			$nomImage = md5(uniqid()) .'.'. $extension;
			$photo = TARGET.$nomImage;
			move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
		} 
	} else {
		$photo = TARGET."defaultuser.png";
	}

	$newUser = new User('', (int)$club, $nom, $prenom, $sexe, $password, 'now', $photo, $email, false); // Crée un nouvel objet utilisateur
	$status = register_checks($newUser, $userController); // Vérifie les conditions d'enregistrement du nouvel utilisateur
}

include('./src/views/register.php'); // Inclut le fichier de vue register.php
