<?php

header('Content-Type: text/html; charset=utf-8');

$response = array(
	'error' => '',
	'data' 	=> '',
);

// Vérification si les champs reçus ne sont pas vides
if (empty ($_POST["username"])) {
	$response['error'] = "Nom d'utilisateur obligatoire";
	echo json_encode($response);
	exit();
}
if (empty ($_POST["password"])) {
	$response['error'] = "Mot de passe obligatoire";
	echo json_encode($response);
	exit();
}
if (empty ($_POST["email"])) {
	$response['error'] = "Adresse mail obligatoire";
	echo json_encode($response);
	exit();
}
if (empty ($_POST["firstname"])) {
	$response['error'] = "Prénom obligatoire";
	echo json_encode($response);
	exit();
}
if (empty ($_POST["lastname"])) {
	$response['error'] = "Nom obligatoire";
	echo json_encode($response);
	exit();
}
// Vérification si les champs passwords sont egaux
if ($_POST["password"] != $_POST["password1"]){
	$response['error'] = "Les mots de passe ne sont pas identiques";
	echo json_encode($response);
	exit();
}

require_once 'include/bdd.php';

$password		= password_hash($_POST["password"], PASSWORD_DEFAULT);
$username		= mysqli_real_escape_string($bdd,$_POST["username"]);
$email			= mysqli_real_escape_string($bdd,$_POST["email"]);
$firstname		= mysqli_real_escape_string($bdd,$_POST["firstname"]);
$lastname		= mysqli_real_escape_string($bdd,$_POST["lastname"]);


//insertion des chaînes de caractères dans la bdd
if (mysqli_query($bdd,'INSERT INTO test_users(username,password,email,firstname,lastname) VALUES ("'.$username.'","'.$password.'","'.$email.'","'.$firstname.'","'.$lastname.'")'))
	$response['data'] 	= "Utilisateur enregistré";
else
	$response['error'] 	= "Erreur";

echo json_encode($response);
mysqli_close($bdd);
?>