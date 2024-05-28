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
		<div class="container bg-light p-3">
			<div class="container text-end">
				<a class="btn btn-secondary m-3" href="rm-order.php?order_id=<?echo $_GET['order_id']?>">
					Отменить
				</a>
			</div>
			<?php
				if ($_GET['order_id'])
				{
					include_once "DataBase.php";
					$db = DataBase::join();
					$qr_orders = $db->query("SELECT * FROM `active-orders` WHERE active_order_id=".$_GET['order_id']);
					if (!empty($qr_orders))
					{
						$active_order = $qr_orders->fetch_assoc();
						$json = json_decode($active_order["orders"]);
						echo '<div class="order container border border-primary bg-lighter p-2 my-2">';
						$summary_price = 0;
						for ($j = 0; $j < count($json); $j++)
						{
							$order_id = $json[$j];
							$query = "SELECT * FROM `orders` WHERE order_id=".$order_id;
							$r = $db->query($query); 
							if (!empty($r))
							{
								$order = $r->fetch_assoc();
								$summary_price += intval($order['price']);
								echo "<div class='px-4 order-price'><i>".$order['name']."</i>: <b><i>".$order['price']."</i> р.</b></div>";
							}
						}
						echo '
						<div class="container px-4"><b><i>ИТОГО: '.$summary_price.' р.</i></b></div>
							<div class="d-flex justify-content-center add pb-1 pt-3">
								<a href="rm-order.php?order_id='.$active_order['active_order_id'].'" class="btn btn-primary make-order-btn m-2"><span class="bi-x-circle-fill"></span> Отмена</a>
								<a class="btn btn-primary m-2" href="order.php?order_id='.$active_order['active_order_id'].'">Подробнее</a>
							</div>
						</div>';
					}
				}
			?>

		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>