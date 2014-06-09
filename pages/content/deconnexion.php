<?php
	session_start();
	session_destroy();
	header('location: http://ft_minishop.local.42.fr:8080/index.php');
?>
