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
