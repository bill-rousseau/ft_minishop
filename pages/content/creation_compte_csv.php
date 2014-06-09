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
