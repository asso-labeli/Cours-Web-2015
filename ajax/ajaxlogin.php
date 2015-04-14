<?php

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
require_once '../include/bdd.php';

$username	= mysqli_real_escape_string($bdd,$_POST["username"]);
$password	= $_POST['password'];
$result 	= mysqli_query($bdd,'SELECT * FROM test_users WHERE username="'.$username.'"');
$user 		= mysqli_fetch_array($result, MYSQLI_ASSOC);

if (empty($user))
{
	$response['error'] = "Nom d'utilisateur inconnu";
	echo json_encode($response);
	exit();
}

if(password_verify($password,$user['password'])) {
	session_start();
	$_SESSION['userID'] = $user['id'];
	$response['data'] 	= $user['id'];
}
else
	$response['error'] = "Mot de passe erroné";
echo json_encode($response);

mysqli_close($bdd);
?>