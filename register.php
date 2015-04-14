<?php

header('Content-Type: text/html; charset=utf-8');
//Vérification des champs données par le HTML
if (empty ($_POST["username"])) {//vérifier si la case existe et si elle est remplie
	echo "Nom d'utilisateur obligatoire";
	exit();
}
if (empty ($_POST["password"])) {
	echo "Mot de passe obligatoire";
	exit();
}
if (empty ($_POST["email"])) {
	echo "Adresse mail obligatoire";
	exit();
}
if (empty ($_POST["firstname"])) {
	echo "Prénom obligatoire";
	exit();
}
if (empty ($_POST["lastname"])) {
	echo "Nom obligatoire";
	exit();
}
if ($_POST["password"] != $_POST["password1"]){
	echo("Les mots de passe ne sont pas identiques");
	exit();
}

require_once 'include/bdd.php';

$password= password_hash($_POST["password"], PASSWORD_DEFAULT);

$username=mysqli_real_escape_string($bdd,$_POST["username"]);
$email=mysqli_real_escape_string($bdd,$_POST["email"]);
$firstname=mysqli_real_escape_string($bdd,$_POST["firstname"]);
$lastname=mysqli_real_escape_string($bdd,$_POST["lastname"]);


//insertion des chaînes de caractères dans la bdd
if (mysqli_query($bdd,'INSERT INTO test_users(username,password,email,firstname,lastname) VALUES ("'.$username.'","'.$password.'","'.$email.'","'.$firstname.'","'.$lastname.'")'))
	echo "Utilisateur enregistré";
else
	echo "Erreur";

mysqli_close($bdd);
?>