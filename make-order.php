<!doctype html>
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
		?>
		<div class="container">
			<div class="d-flex justify-content-end p-3">
				<?php
					if ($user['employee_type_id'] === "2")
					{
						echo '<button class="btn btn-primary" onclick="onMakeOrder()">Создать</button>';
					}
				?>
			</div>
			<div class="container w-100 m-0 p-0">
				<div class="row text-center g-0">
					
					<div class="col">
						<div class="container border border-primary w-100 bg-light p-4">
							<?php 
								$result = $db->query('SELECT * FROM `orders`');
								$orders = $result->fetch_all(MYSQLI_ASSOC);
								$user = $user_find->fetch_assoc();
								foreach($orders as $order)
								{
									echo '<div class="order container border border-primary bg-lighter p-2 my-2">';
									echo "<div class='container text-left'>";
									echo "<h4 class='order-name'><i>".$order['name']."</i></h4>";
									echo "<div class='px-4 order-price'>Цена: <b><i>".$order['price']."</i> р.</b></div>";
									echo "<div class='px-4 order-weight'>вес: <b><i>".$order['weight']."</i> г.</b></div>";
									echo "</div>";	
									if ($user['employee_type_id'] === "2")
									{
										echo '
											<div class="d-flex justify-content-center add pb-1 pt-3">
												<button class="btn btn-primary make-order-btn"><span class="bi-plus"></span>Добавить</button>
											</div>';
									}
									echo '</div>';										
								}
							?>
						</div>
					</div>
					<div class="col">
						<div id="make-order-list" class="container border border-primary border-right-0 w-100 bg-light p-3">
					
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
	<script src="./index.js"></script>
	<script>
		function getOrders() { 
			return <?php
				include_once "DataBase.php";
				$db = DataBase::join();
				$result = $db->query("SELECT * FROM `orders`");
				if (!empty($result))
				{
					print_r(json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE));
				}
			?>;
		}
		function findOrderWithName(name) {
			for (let i of getOrders())
			{
				if (i["name"] == name)
					return i;
			}
			return undefined;
		}
		function onMakeOrder() 
		{
			let mk_ord_lst = document.getElementById('make-order-list');
			if (mk_ord_lst.childElementCount)
			{
				
				let orders = mk_ord_lst.getElementsByClassName('order');
				
				let prm = "";
				for (let i = 1; i <= orders.length; i++)
				{
					let name = orders[i - 1].getElementsByClassName('order-name')[0].getElementsByTagName('i')[0];
					console.log(name);
					let order = findOrderWithName(name.textContent);
					console.log(order);
					prm += `id[]=${order["order_id"]}&`; 
				}
				window.location = 'create-order.php?' + prm;
			}
			
		}
	</script>
</html>