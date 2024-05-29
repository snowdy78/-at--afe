<?php
	include_once "DataBase.php";
	function print_order($order_id)
	{
		if (!$_COOKIE['user_id'])
		{
			echo "unfound user";
			exit;
		}
		$db = DataBase::join();
		$user_id = $_COOKIE['user_id'];
		$user = $db->getUserById($user_id);
		if (!$user)
		{
			echo "user is not found";
			exit;
		}
		$emp_type = $user['employee_type_id'];
		$result = $db->query("SELECT * FROM `active-orders` WHERE active_order_id=".$order_id);
		if ($result)
		{
			$active_order = $result->fetch_assoc();
			$status = $active_order['status'];
			$echo_order_element = function($db, $emp_type, $order_id, $active_order) 
			{
				$status = $active_order['status'];
				$json = json_decode($active_order["orders"]);
				echo '<div class="order container border border-primary bg-lighter p-2 my-2">';
				$summary_price = 0;
				for ($j = 0; $j < count($json); $j++)
				{
					$product_id = $json[$j];
					$query = "SELECT * FROM `orders` WHERE order_id=".$product_id;
					$r = $db->query($query); 
					if (!empty($r))
					{
						$order = $r->fetch_assoc();
						$summary_price += intval($order['price']);
						echo "<div class='px-4 order-price'><i>".$order['name']."</i>: <b><i>".$order['price']."</i> р.</b></div>";
					}
				}
				echo '
				<div class="container px-4"><b><i>ИТОГО: '.$summary_price.' р.</i></b></div>';
				$db = array("Заказ принят", "Заказ готовиться", "Заказ готов");
				$order_status = intval($active_order['status']);
				$confirmed = '';
				$cooking = '';
				$ready = '';
				if ($order_status <= 1)
				{
					$confirmed = 'confirmed-order';
				}
				else 
				{
					$confirmed = 'nothing-order';
				}
				if ($order_status == 2)
				{
					$cooking = 'standby-order';
				}
				else 
				{
					$cooking = 'nothing-order';
				}
				if ($order_status >= 3)
				{
					$ready = 'ready-order';
				}
				else 
				{
					$ready = 'nothing-order';
				}
				echo '
				<div class="container">
					<i class="'.$confirmed.'">Принят ></i>
					<i class="'.$cooking.'">Готовится ></i>
					<i class="'.$ready.'">Готов</i>
				</div>
				';
				echo '	
					<div class="d-flex justify-content-center add pb-1 pt-3">';
				
				
				if ($emp_type === "2") // Официант
				{
					$decline = "Отмена";
					if ($status === "3")
					{
						$decline = "Удалить";
					}
					echo '
						<a 
						class="btn btn-success btn-cook m-2" 
						href="to-cooking.php?order_id='.$order_id.'"
						>
							На готовку
						</a>';
					echo 
					'<a
						href="rm-order.php?order_id='.$order_id.'" 
						class="btn btn-primary make-order-btn m-2"
					>
						<span class="bi-x-circle-fill"></span> '.$decline.'
					</a>';
				}
				else if ($emp_type === "3") // Повар
				{
					echo '
						<a 
						class="btn btn-success btn-cook m-2" 
						href="ready-order.php?order_id='.$order_id.'"
						>
							Готов !
						</a>';
				}
				// Для всех должностей 
			
				echo '
						<a class="btn btn-primary m-2" href="order.php?order_id='.$order_id.'">Подробнее</a>
					</div>
				</div>';
			};
			if ($emp_type === "1")
			{
				$echo_order_element($db, $emp_type, $order_id, $active_order);
			}
			else if (($status === "1" || $status === "3") && $emp_type === "2")
			{
				$echo_order_element($db, $emp_type, $order_id, $active_order);
			}
			else if ($status === "2" && $emp_type === "3")
			{
				$echo_order_element($db, $emp_type, $order_id, $active_order);
			}
		}
	}
?>