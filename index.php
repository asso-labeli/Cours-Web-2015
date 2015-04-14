<?php include 'fragments/header.php' ;?>


<?php


// On vérifie 
if (empty($_SESSION['userID'])){
?>
<div class="col-xs-12">
    <a href="./login.php" class="button">Se connecter</a>
</div>
<div class="col-xs-12">OU</div>
<div class="col-xs-12">
    <a href="./register.php" class="button">S'inscrire</a>
</div>
<?php
} else {

    echo('<a href="logout.php"><input type="submit" value="Se déconnecter"/></a><br><br>');
    echo('ID : '.$_SESSION['userID']);
}

?>


<? include 'fragments/footer.php' ; ?>