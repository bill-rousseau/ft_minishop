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
