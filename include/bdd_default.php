<?php

//connexion au serveur (localhost si WAMP), ""=mot de passe
$bdd=mysqli_connect("localhost","root","","");

if (mysqli_connect_error())
	die("Erreur de connexion à la base de données");

if(!mysqli_set_charset($bdd,"utf8"))
	die("Erreur dans l'encodage utf8");
?>