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

<h2>Votre panier</h2>

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
