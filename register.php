<?php include 'fragments/header.php' ;?>

<form method="post" action="register.php">

<label for="username">Nom d'utilisateur</label><br/><input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required="required"/>
<br/><br/>

<label for="password">Mot de passe</label><br/><input type="password" id="password" name="password" placeholder="Mot de passe" required="required"/>
<br/><br/>

<label for="password1">Confirmer mot de passe</label><br/><input type="password" id="password1" name="password1" placeholder="Mot de passe" required="required"/>
<br/><br/>

<label for="email">Adresse mail</label><br/><input type="email" id="email" name="email" placeholder="Adresse mail" required="required"/>
<br/><br/>

<label for="firstname">Prénom</label><br/><input type="text" id="firstname" name="firstname" placeholder="Prénom" required="required"/>
<br/><br/>

<label for="lastname">Nom</label><br/><input type="text" id="lastname" name="lastname" placeholder="Nom" required="required"/>
<br/><br/>


<input type="submit" value="Enregistrer"/>
</form>

<?php include 'fragments/footer.php' ;?>