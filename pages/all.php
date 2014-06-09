<section>
<article>
<?php
if (!isset($_GET['action']))
include("content/accueil.php");
else
{
if ($_GET['action'] == 'authentification')
include("content/authentification.php");
if ($_GET['action'] == 'creationcompte')
include("content/creationcompte.php");
if ($_GET['action'] == 'panier')
include("content/panier.php");
if ($_GET['action'] == 'catalogue')
include("content/catalogue.php");
if ($_GET['action'] == 'administration')
include("content/administration.php");
if ($_GET['action'] == 'commande')
include("content/commande_valide.php");
}

?>
<a href="index.php">Retour à l'accueil du site</a>
</article>
</section>
<footer>

<h3>Contact</h3>

<p>
Minishop 42</p>
<p>
96 Boulevard BESSIERES<br/>
75017 Paris
</p>
<p>
+33671203633
</p>
 <header>
<h1>MiniShop 42</h1>
</header>
<h2>Navigation</h2>

<nav>
<a href="index.php">Accueil</a>&nbsp<a href="index.php?action=authentification">Authentification</a>&nbsp<a href="index.php?action=creationcompte">Cr&eacute;ation de compte</a>&nbsp<a href="index.php?action=panier">Votre panier</a>&nbsp<a href="index.php?action=catalogue">Notre catalogue</a>&nbsp<a href="index.php?action=administration">Administration du site</a>&nbsp<a href="pages/content/deconnexion.php">D&eacute;connexion</a>&nbsp 
<?php 
session_start();
echo "Bienvenue, ";
if(isset($_SESSION['login'])) 
	echo $_SESSION['login']; 
else 
	echo "user"; 
?>
</nav>
