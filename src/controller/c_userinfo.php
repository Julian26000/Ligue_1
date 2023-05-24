<?php

if (!isset($_SESSION['UserInfo'])) {
    header("Location: /login"); // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
} 

include('./src/model/GestionUser.php');
include('./src/model/User.php');
include('./src/model/GestionClub.php');
include('./src/model/Club.php');

$bdd = new GestionBDD();
$cnx = $bdd->connect(); // Établit la connexion à la base de données

$userController = new GestionUser($cnx); // Crée une instance du contrôleur d'utilisateurs
$gclubs = new GestionClub($cnx); // Crée une instance du contrôleur de clubs

$user = $userController->get_user($_SESSION['UserInfo']->mail); // Récupère l'utilisateur connecté en utilisant l'adresse e-mail stockée dans la session

function isFirstTime($date) {
    if ($date == null) return; // Vérifie si la date est nulle
    $current = date('y-m-d'); // Récupère la date actuelle
    if(strcmp($date, $current) !== 0) return true; // Compare la date actuelle avec la date d'inscription de l'utilisateur
    return false;
}

function colorByAccess($user) {
    $admin = $user->isAdminUti(); // Vérifie si l'utilisateur est un administrateur
    if($admin) return 'text-red-500'; // Retourne une classe CSS pour la couleur de texte si l'utilisateur est un administrateur
    else return 'text-slate-800'; // Retourne une classe CSS pour la couleur de texte si l'utilisateur n'est pas un administrateur
}

$isFirstTime = isFirstTime($user->getDateInscription()); // Vérifie si l'utilisateur s'est inscrit aujourd'hui

include('./src/views/userinfo/userinfo.php'); // Inclut le fichier de vue userinfo.php
