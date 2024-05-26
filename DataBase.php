<?php 
	class DataBase extends mysqli 
	{
		static public function join()
		{
			return new DataBase("localhost", 'root', '', 'tortotoro', 3306);
		}
		public function __construct($servername, $username, $password, $dbname, $dbhost)
		{
			mysqli::__construct($servername, $username, $password, $dbname, $dbhost);
		}
		public function getUser(string $mail, string $password)
		{
			$result = $this->query("SELECT * FROM `users` WHERE mail='$mail' and password='".sha1($password)."'");
			if (!empty($result))
				return $result->fetch_assoc();
			return NULL;
		}
		public function getUserById($id)
		{
			$result = $this->query("SELECT * FROM `users` WHERE id=$id");
			if (!empty($result))
				return $result->fetch_assoc();
			return NULL;
		}
		public function getUsers()
		{
			return $this->query('SELECT * FROM `users`');
		}
	}
?>