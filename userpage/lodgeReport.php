<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Lodge Report</title>
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
				$station_name = $_POST['location'];
				$bicycle_id = $_POST['bicycleID'];
				$parking_id = $_POST['parkingID'];
				$report = $_POST['report'];
				$user_id = Db::checkidUser($mysqli,$username);	
				$station_id = Db::checkidStation($mysqli, $station_name);			
				
				if(Db::addReport($mysqli, $bicycle_id ,$parking_id,$station_id,$report,$user_id)){
					Util::alert('Successfully  lodge!','http://localhost/page/userpage/userpage.html');
				}
				else {
					echo 'station='.$station_id . 'user'.$user_id ;
				}
				
			}
			?>
			</h1>
		</div>
	</body>
</html>