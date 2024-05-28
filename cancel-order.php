<?php
	if ($_GET['order_id'] && $_GET['user_id'])
	{
		include_once "DataBase.php";
		$db = DataBase::join();
		$result = $db->query("SELECT * FROM `active-orders` WHERE active_order_id=".$order_id);
		if ($result)
		{
			$order = $result->fetch_assoc();
			$user = $db->getUserById($_GET['user_id']);
			if ($user)
			{
				$t = $user['employee_type'];
				if ($t === "1")
				{
					header("location: 404.php");
					exit;
				}
				else if ($t === "2")
				{
					header("location: rm-order.php?order_id=".$_GET['order_id']);
					exit;
				}
				else if ($t === "3")
				{
					$order_status = ''.(intval($order['status']) - 1);
					header("location: orders.php"); 
				}
			}
			else 
			{
				echo "user is not found";
			}
		}
		else 
		{
			echo "unknown order";
		}
	}
	else 
	{
		var_dump($_GET['order_id']);
		var_dump($_GET['user_id']);
	}
?>