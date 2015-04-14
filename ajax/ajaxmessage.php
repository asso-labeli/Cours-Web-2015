<?php

header('Content-Type: application/json; charset=utf-8');

$response = array(
	'error' => '',
	'data' 	=> '',
);

// Vérification si les champs reçus ne sont pas vides
if (empty ($_POST["message"])) {
	$response['error'] = "Message obligatoire";
	echo json_encode($response);
	exit();
}

require_once 'include/bdd.php';

session_start();
$content	= mysqli_real_escape_string($bdd,$_POST["message"]);
$id			= $_SESSION['userID'];


//insertion des chaînes de caractères dans la bdd
if (mysqli_query($bdd,'INSERT INTO test_messages (content,author,created) VALUES ("'.$content.'","'.$id.'",NOW())'))
	$response['data'] 	= "Message enregistré";
else
	$response['error'] 	= "Erreur. Veuillez ressayer";

echo json_encode($response);
mysqli_close($bdd);
?>