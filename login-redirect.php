<?php
	include_once "DataBase.php";
	$db = DataBase::join();
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$db->getUser($mail, $password);
	if ($user = $db->getUser($mail, $password)) 
	{
		setcookie('user_id', $user['id']);
		echo "cookie sended!";
	}
	header("location: index.php");	
?>