<?php

if (isset($_SESSION['UserInfo'])) {
    header("Location: /userinfos");
} 

include('./src/model/GestionUser.php');
include('./src/model/User.php');

$bdd = new GestionBDD();

$statusMessage = "";
$class = "";
$mainClass = 'class="control has-icons-left hidden"';

if (isset($_POST['submit'])) {
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];

    $cnx = $bdd->connect();
    $userController = new GestionUser($cnx);

    if ($userController->auth_user($email, $password)) {
        $statusMessage = "You are connected !";
        $class = "class = 'input is-success has-background-success font-bold'";
        header("Location: /profile");
    } else {
        $statusMessage = "Wrong username / password";
        $class = "class = 'input is-danger has-background-danger font-bold'";
    }
    $mainClass = 'class="control has-icons-left"';

}

include('./src/views/login.php');
