<?php 
	if ($_GET['order_id'])
	{
		include "DataBase.php";
		$db = DataBase::join();
		$result = $db->query('SELECT * FROM `active-orders` WHERE active_order_id='.$_GET['order_id']);
		if ($result)
		{
			$order = $result->fetch_assoc();
			if ($order['status'] === "1")
			{
				$new_status = intval($order["status"]) + 1;
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
			echo "order is already or was cooked";
			exit;
		}
		echo "order not found";
		exit;
	}
	header("location: 404.php");
?>