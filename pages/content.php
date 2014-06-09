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
