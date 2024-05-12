<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap demo</title>
		<link href="/css/custom.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
	</head>
	<body data-bs-theme="light">
	<div class="text-center w-100">
		<div class="row">
			<div class="col user-select-none header-btn p-3">
				Заказы
			</div>
			<div class="col user-select-none header-container p-3">
				
			</div>
			<div class="col user-select-none header-container p-3">
				
			</div>
			<a class="col text-decoration-none user-select-none header-btn p-3" href="login.php">
				Авторизация
			</a>
		</div>
	</div>
	<div class="text-center w-100">
		<form class="row justify-content-md-center py-3" method="post" action="login-redirect.php">
			<div class="col-auto">
				<label for="staticEmail2" class="visually-hidden">Email</label>
				<input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
			</div>
			<div class="col-auto">
				<label for="inputPassword2" class="visually-hidden">Password</label>
				<input type="password" class="form-control" id="inputPassword2" placeholder="Password">
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
			</div>
		</form>
	</div>
	</body>
</html>