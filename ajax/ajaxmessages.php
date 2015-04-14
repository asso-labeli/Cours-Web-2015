<?php

header('Content-Type: application/json; charset=utf-8');

$response = array(
	'error' => '',
	'data' 	=> '',
);
session_start();
// Vérification si les champs reçus ne sont pas vides
if (empty ($_SESSION["userID"])) {
	$response['error'] = "Veuillez vous connecter";
	echo json_encode($response);
	exit();
}
require_once '../include/bdd.php';

$result 	= mysqli_query($bdd,'SELECT * FROM test_messages ORDER DESC BY id');
$messages 	= array();

while(($message = mysql_fetch_array($result, MYSQLI_ASSOC))) {
    $messages[] = $message;
}
$response['data'] 	= $messages;
echo json_encode($response);

mysqli_close($bdd);
?>