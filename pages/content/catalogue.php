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

	$art = maketabcsv("data/articles.csv");
	$type = maketabcsv("data/articles.csv");
	$cat = maketabcsv("data/articles.csv");
?>
<form action="pages/content/catalogue_csv.php" method="get">
<table style="border:0px; margin:0px; margin: auto; font-family: monospace; font-weight:bold;">
<tr style="border:0; font-size=130%;">
	<td style="border:0;"> </td>
	<td style="border: 0; color: red;">Nom du jeu</td>
	<td style="border: 0; color: red;">Prix unitaire (&#x20AC)</td>
	<td style="border: 0; color: red;">Categories </td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/dark_souls_2.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[0][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[0][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[0][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[0][1]; ?>">ajouter au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/rayman_legends.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[1][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[1][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[1][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[1][1]; ?>">ajouter au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/child_of_eden.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[2][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[2][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[2][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[2][1]; ?>">ajouter au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/portal_2.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[3][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[3][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[3][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[3][1]; ?>">ajouter au panier</button></td>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/call_of_duty_ghosts.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[4][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[4][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[4][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[4][1]; ?>">ajouter au panier</button></td>
</tr>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/fez.png"></img></td>
	<td style="border: 0;"><?php echo $name[5][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[5][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[5][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[5][1]; ?>">ajouter au panier</button></td>
</tr>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/hearthstone.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[6][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[6][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[6][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[6][1]; ?>">ajouter au panier</button></td>
</tr>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/titanfall.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[7][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[7][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[7][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[7][1]; ?>">ajout au panier</button></td>
</tr>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/diablo_3_reaper_of_souls.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[8][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[8][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[8][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[8][1]; ?>">ajouter au panier</button></td>
</tr>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/south_park_the_stick_of_truth.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[9][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[9][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[9][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[9][1]; ?>">ajouter au panier</button></td>
</tr>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/hatsune_miku_project_diva_f.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[10][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[10][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[10][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[10][1]; ?>">ajouter au panier</button></td>
</tr>
</tr>
<tr style="border:0;">
	<td style="border:0;"><img width="50" height="50" src="images/bioshock_infinite.jpg"></img></td>
	<td style="border: 0;"><?php echo $name[11][1]." "; ?></td>
	<td style="border: 0;"><?php echo $name[11][2]; ?>&#x20AC</td>
	<td style="border: 0;"><?php $res = match_cat($name[4][0]); print_match($res); ?> </td>
	<td style="border: 0;"><button type="submit" name="submit" value="<?php echo $user.','.$name[11][1]; ?>">ajouter au panier</button></td>
</tr>
</table>
</form>

<p>
</p>
