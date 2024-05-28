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
		<div class="container bg-light border border-top-0">
			<h3 class="text-center py-3">Пользователи</h3>
			<?
				if (!empty($_COOKIE['user_id'])) 
				{
					include_once "DataBase.php";
					$db = DataBase::join();
					$user = $db->getUserById($_COOKIE['user_id']);
					if (!empty($user))
					{
						echo '<div class="container text-end">
							<a href="add-user.php" class="btn btn-secondary">Добавить пользователя</a>
							</div>';
						}
					}
					?>
			<hr>
			<?php 
			include_once "DataBase.php";
			
			$db = DataBase::join();
			$result = $db->getUsers();
			
			if (!empty($result))
			{
				$user_jobs = array("Администратор", "Официант", "Повар");
				$users = $result->fetch_all();
				for ($i = 0; $i < $result->num_rows; $i++)
				{
			?>
			<div>
			<div class="row">
			<?
					$user = $users[$i];
					$user_id = $user[0];
					print "<div class='col fs-5 font-weight-bold'>User ".$user_id."</div>";
				?>					
			</div>
			
			<div class="row px-5">
				<div class="col">Email:</div>
				<?php 
					print "<div class='col'>".$user[2]."</div>";
				?>
				
			</div>
			<div class="row px-5">
				<div class="col">Должность:</div>
				
				<?php 
					print "<div class='col'>".$user_jobs[$user[1] - 1]." <span class='text-primary bi-star-fill'></span></div>";
					print "<div class='row'><a class='btn btn-primary' href='rm-user.php?user_id=$user_id'>Удалить</a></div>";
					print "</div>";
					print "</div>";
				}
			}
				?>
				
			<div class="row py-2">
				
			</div>
			
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>