<?php

//header('Content-Type: text/html; charset=utf-8');

if (empty ($_POST["username"])) {//vérifier si la case existe et si elle est remplie
	die("Nom d'utilisateur obligatoire");
}
if (empty ($_POST["password"])) {
	die("Mot de passe obligatoire");
}
require_once 'include/bdd.php';

$username=mysqli_real_escape_string($bdd,$_POST["username"]);
$password=$_POST['password'];

$result = mysqli_query($bdd,'SELECT * FROM test_users WHERE username="'.$username.'"');
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
if (empty($user))
	die("C'est faux");

if(password_verify($password,$user['password'])) {
	//echo 'Vous êtes connecté';
	session_start();
	$_SESSION['userID']=$user['id'];
	header('Location: account.php');
}
else
	die ('Combinaison utilisateur/mot de passe erronée');

mysqli_close($bdd);
?>