<html lang="en">
	<head>
		<?php
			include_once "load-top.php"; 	
		?>
	</head>
	<body data-bs-theme="light">
		<?php
			include_once "load-header.php"; 	
			$user_find = $db->query("SELECT * FROM `users` WHERE id=".$_COOKIE['user_id']);
			if (!$user_find)
			{
				header('location: login.php');
			}
			$user = $user_find->fetch_assoc();
		?>
		<div class="container p-3">
			<?php 
				if ($user['employee_type_id'] === '2') 
				{
					echo '<a href="make-order.php" class="btn btn-secondary bi-plus">Создать заказ</a>';
				}
			?>
			<div class="container p-3">
			<?php
				include_once "DataBase.php";
				$db = DataBase::join();
				$result = $db->query("SELECT * FROM `active-orders`");
				if ($result)
				{
					include "print-order.php";
					if ($result->num_rows === 0)
					{
						echo "Нет активных заказов";
						exit;
					}
					$orders = $result->fetch_all();
					for ($i = 0; $i < $result->num_rows; $i++)
					{
						$order = $orders[$i];
						$order_id = $order[0];
						print_order($order_id);
					}
				}
				else 
				{
					echo "Query Error";
				}
			?>	
			</div>
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>