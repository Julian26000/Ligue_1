<?php

// Inclusion des fichiers nécessaires
include('./src/model/GestionUser.php');
include('./src/model/User.php');
include('./src/model/GestionCommentaire.php');
include('./src/model/Commentaire.php');

// Désactivation de l'affichage des erreurs
error_reporting(0);

// Connexion à la base de données
$bdd = new GestionBDD();
$cnx = $bdd->connect();

// Initialisation des contrôleurs
$gestionCommentaire = new GestionCommentaire($cnx);
$userController = new GestionUser($cnx);
$articleController = new GestionArticle($cnx);

// Récupération de la liste des articles
$articles = $articleController->getListArticle();

// Récupération de l'URI de la requête
$request_uri = $_SERVER['REQUEST_URI'];

if (isset($request_uri)) {
  $route = preg_split('[/]', $request_uri);
  if (isset($route[2])) {
    // Si l'ID de l'article est spécifié dans l'URL
    if(is_numeric($route[2])) {
        // Récupération de l'article correspondant à l'ID
        $article = $articleController->getArticlesById((int)$route[2]);
        // Inclusion de la vue de la page de l'article
        include('./src/views/articles/page_article.php');
    } 
    // Si la chaîne 'new' est spécifiée dans l'URL
    elseif ($route[2] == 'new') {
        // Inclusion de la vue de création d'un nouvel article
        include('./src/views/articles/newarticle.php');
    }
    return;
  }
  // Inclusion de la vue de liste des articles
  include('./src/views/articles/articles.php');
}
