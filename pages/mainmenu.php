<nav>
<a href="index.php">Accueil</a>&nbsp<a href="index.php?action=authentification">Authentification</a>&nbsp<a href="index.php?action=creationcompte">Cr&eacute;ation de compte</a>&nbsp<a href="index.php?action=panier">Votre panier</a>&nbsp<a href="index.php?action=catalogue">Notre catalogue</a>&nbsp<a href="index.php?action=administration">Administration du site</a>&nbsp<a href="pages/content/deconnexion.php">D&eacute;connexion</a>&nbsp 
<?php 
session_start();
echo "<STRONG> <I>                Bienvenue, </STRONG> </I>";
if(isset($_SESSION['login'])) 
	echo $_SESSION['login']; 
else 
	echo "<span class='green'>Anonyme</span>"; 
?>
</nav>
