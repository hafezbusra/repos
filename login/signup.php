<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Sign Up</title>
	</head>
	<body>
		<div>
			<h1>
			<?php
			require_once('../connection.php');
			require_once('../db.php');
			require_once('../util.php');

			echo "test";
			// if the method is POST
			if ($_POST){
				$username = $_POST['username'];
				$password = $_POST['psw'];
				$hp_no = $_POST['hp_no'];
				$address = $_POST['address'];
	
				if(Db::hasUser($mysqli, $username)){
					Util::alert('This username has been taken!', 'http://localhost/page/login/login.html');
				} else {
					if (Db::insertUser($mysqli, $username, $password ,$hp_no ,$address)){
						
						Util::alert('Successfully signed up! Please log in.',"http://localhost/page/login/login.html");
					} else {
						Util::alert('Failed to signed up!', 'http://localhost/page/login/login.html');
					}
				}
			}
			?>
			</h1>
		</div>
	</body>
</html>