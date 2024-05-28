<?php
	include "DataBase.php";
	if ($_GET['id'])
	{
		$ids = [];
		for ($i = 0; $i < count($_GET['id']); $i++)
		{
			$ids[] = $_GET['id'][$i];
		}
		$db = DataBase::join();
		$query = "INSERT INTO `active-orders` VALUES(DEFAULT, '".json_encode($ids)."', DEFAULT)";
		var_dump($query);
		$result = $db->query($query);
		if ($result)
		{
			echo "success!";
			header("location: orders.php");
			exit;
		}
		var_dump($result);
	}
?>