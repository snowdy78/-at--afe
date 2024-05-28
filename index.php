<?php 
	if (empty($_COOKIE['user_id']))
		header("location: login.php");
	else 
		header("location: main.php");
?>