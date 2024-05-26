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
				<button class="btn btn-secondary m-3" type="submit">
					Отменить
				</button>
			</div>
			<?php
				include_once "DataBase.php";
				$db = DataBase::join();
				$qr_orders = $db->query("SELECT * FROM `orders` WHERE order_id=".$_GET['orderid']);
				if (!empty($qr_orders))
				{
					$order = $qr_orders->fetch_assoc();
			?>			
					<div class="order container border border-primary bg-lighter p-2">
						<?
										
							echo "<div class='container text-left'>";
							echo "<h4 class='order-name'><i>".$order['name']."</i></h4>";
							echo "<div class='px-4 order-price'>Цена: <b><i>".$order['price']."</i> р.</b></div>";
							echo "<div class='px-4 order-weight'>вес: <b><i>".$order['weight']."</i> г.</b></div>";
							echo "</div>";	
						?>	
					</div>
			<?php
				}
			
			?>
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>