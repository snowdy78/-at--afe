<?php 
	if ($_GET['order_id']) 
	{
		include "DataBase.php";
		$db = DataBase::join();
		$order_id = $_GET['order_id'];
		$result = $db->query("SELECT * FROM `active-orders` WHERE active_order_id=".$order_id);
		if ($result)
		{
			$order = $result->fetch_assoc();
			if ($order['status'] != "2")
			{
				echo "order is not ready to be 'Ready' LOL :)";
				exit;
			}
			$new_status = intval($order['status']) + 1;
			$updated = $db->query("UPDATE `active-orders` SET status=".$new_status." WHERE active_order_id=".$_GET['order_id']);
			if (!$updated)
			{
				echo "UpdateOrderStatusError";
			}
			else 
			{
				header('location: ' . $_SERVER['HTTP_REFERER']);
			}
			exit;
		}
		echo "Order not found";
		exit;
	}
	echo "order_id is undefined";
?>