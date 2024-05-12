<div class="text-center w-100">
	<div class="row w-100 g-0">
		<a class="col-1 header-container" href="index.php">
			<img src="logo.svg" height="50">
		</a>
		<?php 
			include_once "DataBase.php";
			$db = DataBase::join();
			$user = $db->getUserById($_COOKIE['user_id']);
			if (!empty($user))
			{
				if ($user['employee_type_id'] === "1")
				{
					echo `<a class="col-2 text-decoration-none user-select-none header-btn p-3">Заказы</a>`;
				}
			}
		?>
		<div class="col-8 user-select-none header-container p-3">
			
		</div>
		<a class="col-1 text-decoration-none user-select-none header-btn p-3" href="login.php">
			Авторизация
		</a>
	</div>
</div>