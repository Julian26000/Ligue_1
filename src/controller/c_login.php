<?php

if (isset($_SESSION['UserInfo'])) {
    header("Location: /userinfos"); // Redirige l'utilisateur vers la page /userinfos s'il est déjà connecté
} 

include('./src/model/GestionUser.php');
include('./src/model/User.php');

$bdd = new GestionBDD();

$statusMessage = ""; // Message de statut affiché à l'utilisateur
$class = ""; // Classe CSS appliquée à l'élément HTML
$mainClass = 'class="control has-icons-left hidden"'; // Classe CSS appliquée à l'élément HTML

if (isset($_POST['submit'])) {
	$email = $_REQUEST['email']; // Récupère la valeur de l'entrée 'email' du formulaire
	$password = $_REQUEST['password']; // Récupère la valeur de l'entrée 'password' du formulaire

    $cnx = $bdd->connect(); // Établit la connexion à la base de données
    $userController = new GestionUser($cnx); // Crée une instance du contrôleur d'utilisateurs

    if ($userController->auth_user($email, $password)) { // Vérifie les informations d'identification de l'utilisateur
        $statusMessage = "You are connected !"; // Message de connexion réussie
        $class = "class = 'input is-success has-background-success font-bold'"; // Classe CSS pour un affichage réussi
        header("Location: /profile"); // Redirige l'utilisateur vers la page /profile après la connexion
    } else {
        $statusMessage = "Wrong username / password"; // Message d'erreur d'identification incorrecte
        $class = "class = 'input is-danger has-background-danger font-bold'"; // Classe CSS pour un affichage d'erreur
    }
    $mainClass = 'class="control has-icons-left"'; // Affiche l'élément HTML principal avec les icônes
}

include('./src/views/login.php'); // Inclut le fichier de vue login.php
