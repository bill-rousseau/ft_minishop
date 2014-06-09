<h1>A la une</h1>

<p>
Vous vous &ecirc;tes identifi&eacute; avec succ&egrave;s!
</p>
<h1>Administration</h1>
<h1>Authentification</h1>

<p>
<form method="post" action="pages/content/authentification_csv.php">
<label for="login">Identifiant: </label><input id="login" type="text" name="login"/><br/>
<label for="passwd">Mot de passe: </label><input id="passwd" type="password" name="passwd"/><br/>
<input type="submit" name="submit" value="OK"/>
</form>

</p>
<?php
	session_destroy();
	session_start();
	if (isset($_POST['login']) && isset($_POST['passwd']))
	{
		$login = $_POST['login'];
		$passwd = $_POST['passwd'];
		$fd = fopen("../../data/users.csv", "r");
		while ($tab = fgetcsv($fd, ","))
			$name[] = $tab;
		foreach ($name as $str)
		{
			foreach ($str as $log => $pass)
			{
				if ($log == $passwd && $pass == $log)
					$_SESSION['login'] = $login;
			}
		}
		fclose($fd);
	}
	if ($_SESSION['login'] == $login)
	{
		$a = '"';
		$b = ",";
		$fd = fopen("../../data/panier.csv", "r");
		while ($tab = fgetcsv($fd, ","))
			$name1[] = $tab;
		fclose($fd);
		$fd = fopen("../../data/panier.csv", "r+");
		$i = 0;
		while ($name1[$i])
		{
			if ($name1[$i][0] == "user")
				$name1[$i][0] = $_SESSION['login'];
			fwrite($fd, $a.$name1[$i][0].$a.$b.$a.$name1[$i][1].$a."\n");
			$i++;
		}
		fclose($fd);
		header('location: http://ft_minishop.local.42.fr:8080/index.php');
	}
	else
		header('location: http://ft_minishop.local.42.fr:8080/index.php?action=authentification');
?>
<?php
	if (isset($_SESSION['login']))
		$user = $_SESSION['login'];
	else
		$user = "user";
	$fd = fopen("data/articles.csv", "r");
	while ($tab = fgetcsv($fd, ","))
		$name[] = $tab;
	fclose($fd);

function maketabcsv($path)
{
	$fd = fopen($path, "r");
	while ($tab = fgetcsv($fd, ","))
		$name[] = $tab;
	fclose($fd);
	return ($name);
}

function match_cat($game)
{
	$type = maketabcsv("data/categories.csv");
	$cat = maketabcsv("data/catalogue.csv");
	$i = 0;
	$j = 0;
	while ($cat[$i][0] != "")
	{
		if ($cat[$i][0] == $game)
		{
			$check = $cat[$i][1] - 1;
			$res[$j] = $type[$check][1];
			$j++;
		}
		$i++;
	}
	return ($res);
}

function print_match($array)
{
	foreach ($array as $elem)
	{
		print($elem." - ");
	}
}

?><h1>A la une</h1>

<?php
	$art = maketabcsv("data/articles.csv");
	$type = maketabcsv("data/articles.csv");
	$cat = maketabcsv("data/articles.csv");
?>
<form action="pages/content/catalogue_csv.php" method="get">
<table style="border:0px; margin:0px;">
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/dark_souls_2.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[0][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[0][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[0][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[0][1]; ?>">ajout au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/rayman_legends.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[1][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[1][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[1][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[1][1]; ?>">ajout au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/child_of_eden.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[2][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[2][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[2][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[2][1]; ?>">ajout au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/portal_2.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[3][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[3][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[3][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[3][1]; ?>">ajout au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/call_of_duty_ghosts.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[4][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[4][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[4][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[4][1]; ?>">ajout au panier</button></td>
</tr>
</table>
</form>

<p>
</p>
<?php
	$fd = fopen("../../data/panier.csv", "a+");
	$a = '"';
	$b = ",";
	$tab = explode(",", $_GET['submit']);
	$str = $a.$tab[0].$a.$b.$a.$tab[1].$a."\n";
	fwrite($fd, $str);
	fclose($fd);
	header('location: http://ft_minishop.local.42.fr:8080/index.php?action=catalogue');
?>
<?php
	if (isset($_GET['submit']))
		$login = $_GET['submit'];
	if ($login == "user")
		header("location: http://ft_minishop.local.42.fr:8080/index.php?action=authentification");
	else
	{
		$fd = fopen("../../data/panier.csv", "r");
		while ($tab = fgetcsv($fd, ","))
			$name[] = $tab;
		fclose($fd);
		$f = fopen("../../data/panier.csv", "w+");
		$a = '"';
		$b = ",";
		$i = 0;
		while (isset($name[$i]))
		{
			if ($login == $name[$i][0])
			{
				$str = $a.$a.$b.$a.$a."\n";
				fwrite($f, $str);
			}
			else
			{
				$s = $a.$name[$i][0].$a.$b.$a.$name[$i][1].$a."\n";
				fwrite($f, $s);
			}
			$i++;
		}
		fclose($f);
		header("location: http://ft_minishop.local.42.fr:8080/index.php?action=commande");

	}
?>
<p>
Votre commande est bien valider
</p>
<?php
	if (isset($_POST['login']) && isset($_POST['passwd']) && $_POST['login'] != NULL && $_POST['passwd'] != NULL)
	{
		$login = $_POST['login'];
		$passwd = $_POST['passwd'];
		$fd = fopen("../../data/users.csv", "a+");
		$count = 1;
		while ($tab = fgetcsv($fd, ","))
			$name[] = $tab;
		$_SESSION['login'] = $login;
 		$a = '"';
		$b = ",";
		$str = $a.$login.$a.$b.$a.$passwd.$a."\n";
		fwrite($fd, $str);
		fclose($fd);
		header('location: http://ft_minishop.local.42.fr:8080/index.php');
	}
	else
		header('location: http://ft_minishop.local.42.fr:8080/index.php?action=creationcompte');	
?>
<h1>Cr&eacute;ation de compte</h1>

<form method="post" action="pages/content/creation_compte_csv.php">
<label for="login">Identifiant: </label><input id="login" type="text" name="login"/><br/>
<label for="passwd">Mot de passe: </label><input id="passwd" type="password" name="passwd"/><br/>
<input type="submit" name="submit" value="OK"/>
</form>
<?php
	session_start();
	session_destroy();
	header('location: http://ft_minishop.local.42.fr:8080/index.php');
?>
<?php
	$s1 = explode(",", $_GET['submit']);
	$fd = fopen("../../data/panier.csv", "r");
	while ($tab = fgetcsv($fd, ","))
		$name[] = $tab;
	fclose($fd);
	$f = fopen("../../data/panier.csv", "w+");
	$a = '"';
	$b = ",";
	$i = 0;
	while (isset($name[$i]))
	{
		if ($s1[0] == $name[$i][0] && $s1[1] == $name[$i][1])
		{
			$str = $a.$a.$b.$a.$a."\n";
			fwrite($f, $str);
		}
		else if (isset($name[$i][0]))
		{
			$s = $a.$name[$i][0].$a.$b.$a.$name[$i][1].$a."\n";
			fwrite($f, $s);
		}
		$i++;
	}
	fclose($f);
	header("location: http://ft_minishop.local.42.fr:8080/index.php?action=panier");
 ?>
<?php
	$fd = fopen("data/panier.csv", "r");
	while ($tab = fgetcsv($fd, ","))
		$name[] = $tab;
	fclose($fd);
?>
<?php
	$fd = fopen("data/articles.csv", "r");
	while ($tab = fgetcsv($fd, ","))
		$name_art[] = $tab;
	fclose($fd);
?>

<h1>Votre panier</h1>

<?php
	$i = 0;
	$price = 0;
	$count = 0;
	while (isset($name[$i]))
	{
		$y = 0;
		if (isset($_SESSION['login']) == $name[$i][0] || $name[$i][0] == "user")
		{
			while (isset($name_art[$y]))
			{
				if ($name[$i][1] == $name_art[$y][1])	
				{
					$login = $name[$i][0];
					$count++;
					$price = $price + floatval($name_art[$y][2]);
					echo $name[$i][1]." ".$name_art[$y][2]."&#8364";?><form action="pages/content/delete_panier.php" method="get"><button type="submit" name="submit" value="<?php echo $name[$i][0].",".$name[$i][1];  ?>">supprimer</button></form><?php
}
				else if ("user" == $name_art[$y][1])
				{
					$count++;
					$price = $price + floatval($name_art[$y][2]);
	echo $name[$i][1]." ".$name_art[$y][2]."&#8364";?><form action="pages/content/delete_panier.php" method="get"><button type="submit" name="submit" value="<?php echo "user".",".$name[$i][1];  ?>">supprimer</button></form>"<?php
				}
				$y++;
			}
		}
		$i++;
	}
	if ($count > 0)
	{
		echo "Total:    ".$price."&#8364";
		?>
		<form action="pages/content/commande.php" method="get"><button type="submit" name="submit" value="<?php echo $login; ?>">Commander</button></form>
		<?php
	}
	else
		echo "Le panier est vide";
?>

<p>
</p>
