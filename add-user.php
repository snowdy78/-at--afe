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
			<form class="container text-end" method="post" action="add-user-redirection.php">
			
				<button class="btn btn-secondary m-3" type="submit">
					Добавить
				</button>
				<div class="container text-center">
					<div class="input-group mb-3">
						<input type="mail" class="form-control" name="mail" placeholder="E-Mail" aria-label="Username" aria-describedby="basic-addon1">
						<select class="form-select" name="employee-type" aria-label="Default select example">
							<option value="1">Администратор</option>
							<option value="2">Официант</option>
							<option value="3">Повар</option>
						</select>
					</div>
					<input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
				</div>
			</form>
			
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>