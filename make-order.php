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
		?>
		<div class="container">
			<div class="d-flex justify-content-end p-3">
				
				<button class="btn btn-primary">Создать</button>
			</div>
			<div class="container w-100 m-0 p-0">
				<div class="row text-center g-0">
					<div class="col">
						<div class="container border border-primary border-right-0 w-100 bg-light p-3">
							<script>
								sessionStorage.setItem();
							</script>
						</div>
					</div>
					<div class="col">
						<div class="container border border-primary w-100 bg-light p-4">
							<?php 
									include_once "DataBase.php";
									$db = DataBase::join();
									$result = $db->query('SELECT * FROM `orders`');
									$orders = $result->fetch_all(MYSQLI_ASSOC);
									foreach($orders as $order)
									{
							?>
										<div class="container border border-primary p-2 m-2">
							<?
											
										echo "<div class='container'>";
										echo "<h4 class='row'>".$order['name']."</h4>";
										echo "<div class='row px-4'>Цена: ".$order['price']." р.</div>";
										echo "<div class='row px-4'>вес: ".$order['weight']." г.</div>";
										echo "</div>";
										
							?>	
								<div class="d-flex justify-content-end">
									<button class="btn btn-primary"><span class="bi-plus"></span>Добавить</button>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>