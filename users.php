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
			<hr>
			<div class="row">
		<?php 
			include_once "DataBase.php";

			$db = DataBase::join();
			$users = $db->getUsers();

			if (!empty($users))
			{
				$user_jobs = array("Администратор", "Официант", "Повар");
				for ($i = 0; $i < $users->num_rows; $i++)
				{
					$user = $users->fetch_all()[$i];
					print "<div class='col fs-5 font-weight-bold'>User ".$user[0]."</div>";
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
				}}
				?>
				
			</div>
			<div class="row py-2">
				
			</div>
			
		</div>
	</body>
	<?php
		include_once "load-bottom.php"; 	
	?>
</html>