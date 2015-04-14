<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
if (empty($_SESSION['userID']))
	die('Vous devez vous connecter');
echo('<a href="logout.php"><input type="submit" value="Se déconnecter"/></a><br><br>');
echo('ID : '.$_SESSION['userID']);
?>