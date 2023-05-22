<?php

if (!isset($_SESSION['UserInfo'])) {
    header("Location: /login");
} 

include('./src/model/GestionUser.php');
include('./src/model/User.php');
include('./src/model/GestionClub.php');
include('./src/model/Club.php');

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$userController = new GestionUser($cnx);
$gclubs = new GestionClub($cnx);

$user = $userController->get_user($_SESSION['UserInfo']->mail);

function isFirstTime($date) {
    if ($date == null) return;
    $current = date('y-m-d');
    if(strcmp($date, $current) !== 0) return true;
    return false;
}

function colorByAccess($user) {
    $admin = $user->isAdminUti();
    if($admin) return 'text-red-500'; 
    else return 'text-slate-800';
}

$isFirstTime = isFirstTime($user->getDateInscription());

include('./src/views/userinfo/userinfo.php');
