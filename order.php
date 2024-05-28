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
				<?php 
					include_once "DataBase.php";
					$db = DataBase::join();
					if ($_COOKIE["user_id"])
					{
						$user = $db->getUserById($_COOKIE['user_id']);
						if ($user)
						{
							if ($user['employee_type_id'] === "2")
							{
								echo '
									<a class="btn btn-secondary m-3" href="rm-order.php?order_id='.$_GET["order_id"].'">
										Отменить
									</a>';
							}
						}

					}
					else 
					{
						header('location: index.php');
					}
				?>
			</div>
			<?php
				if ($_GET['order_id'])
				{
					include_once "print-order.php";
					print_order($_GET['order_id']);
				}
			?>
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>