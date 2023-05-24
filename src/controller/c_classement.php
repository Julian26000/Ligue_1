<?php

// Inclusion des fichiers nécessaires
include('./src/model/GestionClassement.php');
include('./src/model/GestionUser.php');
include('./src/model/Classement.php');
include('./src/model/User.php');

// Connexion à la base de données
$bdd = new GestionBDD();
$cnx = $bdd->connect();

// Initialisation des contrôleurs
$classementController = new GestionClassement($cnx);
$userController = new GestionUser($cnx);

// Récupération du classement des saisons
$saisons = $classementController->getClassement();

// Inclusion de la vue du classement
include('./src/views/classement/classement.php');
