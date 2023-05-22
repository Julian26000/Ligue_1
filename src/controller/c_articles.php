<?php

include('./src/model/GestionUser.php');
include('./src/model/User.php');
include('./src/model/GestionCommentaire.php');
include('./src/model/Commentaire.php');

error_reporting(0);


$bdd = new GestionBDD();
$cnx = $bdd->connect();

$gestionCommentaire = new GestionCommentaire($cnx);
$userController = new GestionUser($cnx);
$articleController = new GestionArticle($cnx);

$articles = $articleController->getListArticle();

$request_uri = $_SERVER['REQUEST_URI'];

if (isset($request_uri)) {
  $route = preg_split('[/]', $request_uri);
  if (isset($route[2])) {
    if(is_numeric($route[2])) {
        $article = $articleController->getArticlesById((int)$route[2]);
        include('./src/views/articles/page_article.php');
    } elseif ($route[2] == 'new') {
        include('./src/views/articles/newarticle.php');
    }
    return;
  }
  include('./src/views/articles/articles.php');
}