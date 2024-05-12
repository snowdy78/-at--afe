<?php 
	if (empty($_COOKIE['mail']) || empty($_COOKIE['password']))
		header("location: login.php");
	else 
		header("location: main.php");
?>