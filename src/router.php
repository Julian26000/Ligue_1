<?php

include('./src/model/GestionBDD.php'); // Inclusion du fichier GestionBDD.php
include('./src/model/GestionArticle.php'); // Inclusion du fichier GestionArticle.php
include('./src/model/Article.php'); // Inclusion du fichier Article.php

function to404() {
    require __DIR__ . '/views/404.php';
}

function handleroute($route) {
    switch ($route[1]) {
        case '':
            require __DIR__ . '/views/menu.php';
            break;
        case 'login':
            if(isset($route[2])) to404();
            require __DIR__ . '/controller/c_login.php';
            break;
        case 'register':
            if(isset($route[2])) to404();
            require __DIR__ . '/controller/c_register.php';
            break;
        case 'articles':
            if(isset($route[2])) {
                if(is_numeric($route[2])) {
                    $bdd = new GestionBDD();
                    $cnx = $bdd->connect();
                    $articleController = new GestionArticle($cnx);

                    $article = $articleController->getArticlesById((int)$route[2]);

                    if($article == null) {
                        to404();
                        return;
                    }  
                    require __DIR__ . '/controller/c_articles.php';
                } else {
                    switch ($route[2]) {
                        case 'new':
                            require __DIR__ . '/controller/c_articles.php';
                            break;
                        default:
                            to404();
                            break;
                    }
                    return;
                }
            }
            require __DIR__ . '/controller/c_articles.php';
            break;
        case 'classement':
            if(isset($route[2])) to404();
            require __DIR__ . '/controller/c_classement.php';
            break;
        case 'disconnect':
            if(isset($route[2])) to404();
            require __DIR__ . '/controller/c_disconnect.php';
            break;
        case 'profile':
            if(isset($route[2])) {
                switch ($route[2]) {
                    case 'parametres':
                        require __DIR__ . '/controller/c_userinfo.php';
                        break;
                    case 'contact':
                        require __DIR__ . '/controller/c_userinfo.php';
                        break;
                    default:
                        to404();
                        break;
                }
                return;
            }
            require __DIR__ . '/controller/c_userinfo.php';
            break;
        default:
            to404();
    }
}

$request_uri = $_SERVER['REQUEST_URI'];

if (isset($request_uri)) {
    $route = preg_split('[/]', $request_uri);
    handleroute($route);
}
