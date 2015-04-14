<?php include 'fragments/header.php' ;?>

<h2>Connexion</h2>
</header>
<form method="post" action="login.php">
<label for="username">Nom d'utilisateur</label><br/><input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required="required"/>
<br/><br/>

<label for="password">Mot de passe</label><br/><input type="password" id="password" name="password" placeholder="Mot de passe" required="required"/>
<br/><br/>
<input type="submit" value="Se connecter"/>
</form>



<?php include 'fragments/footer.php' ;?>