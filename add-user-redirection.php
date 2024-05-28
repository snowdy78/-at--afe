<?php
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$type = $_POST['employee-type'];
	if ($mail && $password && $type)
	{
		include_once "DataBase.php";
		$db = DataBase::join();
		$query = "INSERT INTO `users` VALUES (DEFAULT, '$type', '$mail', '".sha1($password)."')";
		$query_result = $db->query($query);
		if ($query_result)
		{
			header('location:users.php'); 
		}
		else 
		{
			var_dump($query);
			echo "\nQuery failed";
		}

	}
	else 
	{
		var_dump($mail);
		var_dump($password);
		var_dump($type);
		echo "\nUnable to add user: fill all fields";
	}
?>