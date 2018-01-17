<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Setting</title>
	</head>
	<body>
		<div>
			<h1>
			<?php
			session_start();
			require_once('../connection.php');
			require_once('../db.php');
			require_once('../util.php');


			if (empty($_SESSION['username'])){
			Util::alert('You are not logged in.'.$_SESSION['username'], 'http://localhost/page/login/login.html');
		}
			$username = $_SESSION['username'];

			// if the method is POST
			if ($_POST){
				$address = $_POST['address'];
				$hp_no = $_POST['hp_no'];
				$password = $_POST['password'];
				$user_id = Db::checkidUser($mysqli,$username);	
				
				if(!empty($address)) {
					if(Db::updateSettingAddress($mysqli,$user_id, $address))
						{
							Util::alert('Successfully  lodge!','http://localhost/page/userpage/userpage.html');
						}
					else {
						echo  'user'.$user_id ;
					}
				}
					
				if(!empty($hp_no)) {Db::updateSettingHp($mysqli,$user_id, $hp_no);}
				if(!empty($username)) {Db::updateSettingUsername($mysqli,$user_id, $username);}
				if(!empty($password)) {Db::updateSettingPassword($mysqli,$user_id, $password);}
				
			}
			?>
			</h1>
		</div>
	</body>
</html>