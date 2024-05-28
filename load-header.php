<div class="text-center w-100">
	<div class="row w-100 g-0">
		<a class="col-1 header-container" href="index.php">
			<img src="logo.svg" height="50">
		</a>
		<?php 
			include_once "DataBase.php";
			$db = DataBase::join();
			$user = $db->getUserById($_COOKIE['user_id']);
			$count = 0;
			if (!empty($user))
			{

				if ($user['employee_type_id'] === "1")
				{
					print "<a class='col text-decoration-none user-select-none header-btn p-3' href='users.php'>Пользователи</a>";
					print "<a class='col text-decoration-none user-select-none header-btn p-3' href='orders.php'>Заказы</a>";
					$count += 3;
				}
				else if ($user['employee_type_id'] === "2")
				{
					print "<a class='col text-decoration-none user-select-none header-btn p-3' href='orders.php'>Заказы</a>";
					$count += 2;
				}
				else if ($user['employee_type_id'] === "3")
				{
					print "<a class='col text-decoration-none user-select-none header-btn p-3' href='orders.php'>Заказы</a>";
					$count += 2;
				}
			}
			print "<div class='col-".(9 - $count)." user-select-none header-container p-3'>";
		?>
		
			
		</div>
		<a class="col text-decoration-none user-select-none header-btn p-3" href="login.php">
			Авторизация
		</a>
	</div>
</div>