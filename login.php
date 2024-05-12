<!doctype html>
<html lang="en">
	<head>
		<?php 
			include "load-top.php";
		?>
	</head>
	<body data-bs-theme="light">
		<div class="text-center w-100">
			<div class="row g-0">
				<a class="col-12 text-decoration-none user-select-none header-container p-3">
					Авторизация
				</a>
			</div>
		</div>
		<div class="text-center h-100 w-100 p-5 border">
			<form method="post" action="login-redirect.php">
				<div class="row justify-content-md-center py-3">
					<div class="col-auto">
						<label for="staticEmail2" class="visually-hidden">Email</label>
						<input type="text" readonly class="form-control-plaintext" value="Почта">
					</div>
					<div class="col-auto">
						<label for="inputPassword2" class="visually-hidden">Password</label>
						<input type="text" class="form-control" name="mail" placeholder="Email">
					</div>
				</div>
				<div class="row justify-content-md-center py-3">
					<div class="col-auto">
						<label for="staticEmail2" class="visually-hidden">Email</label>
						<input type="text" readonly class="form-control-plaintext" value="Пароль">
					</div>
					<div class="col-auto">
						<label for="inputPassword2" class="visually-hidden">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					
					</div>
				</div>
				<button type="submit" class="btn btn-primary m-3">Авторизоваться</button>
			</form>
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>