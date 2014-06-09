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
