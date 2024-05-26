<html lang="en">
	<head>
		<?php
			include_once "load-top.php"; 	
		?>
	</head>
	<body data-bs-theme="light">
		<?php
			include_once "load-header.php"; 	
		?>
		<div class="container p-3">
			<a href="make-order.php" class="btn btn-secondary bi-plus">Создать заказ</a>
			<div class="container p-3">
				<?php
					include_once "DataBase.php";
					$db = DataBase::join();
					$result = $db->query("SELECT * FROM `active-orders`");
					if ($result)
					{
						if ($result->num_rows)
						{
							$active_orders = $result->fetch_all(MYSQLI_ASSOC);
							for ($i = 0; $i < $result->num_rows; $i++)
							{
								$active_order = $active_orders[$i];
								$json = json_decode($active_order["orders"]);
								$query = "SELECT * FROM `orders` WHERE order_id IN (";
								$stop = count($json);
								for ($j = 0; $j < $stop; $j++)
								{
									$query = $query. "'".$json[$j]."'";
									if ($j != $stop - 1)
									{
										$query = $query.", ";
									}
								} 
								$query = $query.")";
								var_dump($json);
								$r = $db->query($query); 
								if (!empty($r))
								{
									$dish_pack = $r->fetch_all(MYSQLI_ASSOC);
				?>
								<div class="order container border border-primary bg-lighter p-2 my-2">
									<?
										$summary_price = 0;
										for ($x = 0; $x < $r->num_rows; $x++)
										{
											$order = $dish_pack[$x];
											$summary_price += intval($order['price']);
											echo "<div class='px-4 order-price'><i>".$order['name']."</i>: <b><i>".$order['price']."</i> р.</b></div>";
										}
										echo "<div class='container px-4'><b><i>ИТОГО: ".$summary_price." р.</i></b></div>"
									?>	
									<div class="d-flex justify-content-center add pb-1 pt-3">
										<button class="btn btn-primary make-order-btn"><span class="bi-x-circle-fill"></span> Отмена</button>
									</div>
								</div>
				<?php
								}
							}
						}
						else 
						{
							echo "В данный момент нет активных заказов";
						}
					}
				?>
			</div>
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>