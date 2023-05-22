<?php

if (isset($_SESSION['UserInfo'])) {
    header("Location: index.php?page=userinfos");
} 

include('./src/model/GestionClub.php');
include('./src/model/Club.php');
include('./src/model/GestionUser.php');
include('./src/model/User.php');

$bdd = new GestionBDD();
$cnx = $bdd->connect();

$gclubs = new GestionClub($cnx);
$clubs = $gclubs->getListClub();

$userController = new GestionUser($cnx);

function check_mdp_format($mdp) {
	$majuscule = preg_match('@[A-Z]@', $mdp);
	$minuscule = preg_match('@[a-z]@', $mdp);
	$chiffre = preg_match('@[0-9]@', $mdp);
	
	if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8)
	{
		return false;
	}
	return true;
}

function register_checks($newUser, $userController) {
	$username = $newUser->getMailUti();
	$password = $newUser->getPasswordUti();

	$mainClass = 'class="control has-icons-left"';

	if ($userController->isAlreadyUsed($username)) {
		$statusMessage = "The mail ". $username . " is already registrated";
		$class = "class = 'input is-danger has-background-danger font-bold'";
		return (object) ['main' => $mainClass, 'statusMessage' => $statusMessage, 'style' => $class];
	}

	if (check_mdp_format($password)) {
		$newUser->setPasswordUti(password_hash($password, PASSWORD_DEFAULT)); // hash password & update user
		$userController->register($newUser);
		$statusMessage = "Account Created !";
		$class = "class = 'input is-success has-background-success font-bold'";
		sleep(0.5);
		$userController->auth_user($username, $password);
		header("Location: /profile");
	} else {
		$statusMessage = "Wrong password format !".password_hash($password, PASSWORD_DEFAULT);
		$class = "class = 'input is-danger has-background-danger font-bold'";
	}
	return (object) ['main' => $mainClass, 'statusMessage' => $statusMessage, 'style' => $class];
}

$mainClass = 'class="control has-icons-left ';
$status = (object) ['main' => $mainClass.'hidden"', 'statusMessage' => 'bot detected', 'style' => ''];

if (isset($_POST['submit'])) {

	if($_REQUEST['verif'] != null) {
		$status = (object) ['main' => $mainClass.'"', 'statusMessage' => 'bot detected', 'style' => "class = 'input is-danger has-background-danger font-bold'"];
		return;
	} 
               
	$club = $_REQUEST['club'];
	$nom = $_REQUEST['nom'];
	$prenom = $_REQUEST['prenom'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$sexe = $_REQUEST['sexe'];
	$image = $_FILES['photo']['name'];

	define('TARGET', './assets/avatar/');    // Repertoire cible

	if(isset($image) and !empty($image)){
		$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
		$extension  = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

		if(in_array(strtolower($extension),$tabExt)){
			$nomImage = md5(uniqid()) .'.'. $extension;
			$photo = TARGET.$nomImage;
			move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
		} 
	} else {
		$photo = TARGET."defaultuser.png";
	}

	$newUser = new User('', (int)$club, $nom, $prenom, $sexe, $password, 'now', $photo, $email, false);
	$status = register_checks($newUser, $userController);
}

include('./src/views/register.php');


