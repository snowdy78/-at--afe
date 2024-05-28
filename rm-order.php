<?php
	if (!empty($_GET['order_id'])) 
	{
		include_once "DataBase.php";
		$db = DataBase::join();
		if ($db->query("DELETE FROM `active-orders` WHERE active_order_id=".$_GET['order_id']))
		{
			header("location:orders.php");
		} 
		else
		{
			echo "Error occurred";
		}
	} 
	else 
	{
		echo "order id not found";
	}
?>