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
