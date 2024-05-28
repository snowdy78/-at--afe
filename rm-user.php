<?php
	if ($_GET['user_id'])
	{
		include_once "DataBase.php"; 
		$db = DataBase::join();
		if ($db->query("DELETE FROM `users` WHERE id=".$_GET['user_id']))
		{
			if ($_COOKIE['user_id'] == $_GET['user_id'])
			{
				header("location: login.php");
			}
			else 
			{
				header("location: users.php");
			}
		}
		else
		{
			var_dump($_GET['user_id']);
			echo "user is not found at database";
		}
	}
	else
	{
		echo "user_id is NULL";
	}
?>