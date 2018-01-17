<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Add Bicycle</title>
	</head>
	<body>
		<div>
			<h1>
			<?php
			require_once('../connection.php');
			require_once('../db.php');
			require_once('../util.php');

			echo $bicycle_type;
			// if the method is POST
			if ($_POST){
				$bicycle_type = $_POST['bicycle_type'];
				$station_id = $_POST['station_id'];
	
					if (Db::addBike($mysqli, $bicycle_type, $station_id)){
						
						Util::alert('Successfully adding bicycle!','http://localhost/page/adminpage/intro.html');
					} 
					else
					{
						echo $bicycle_type;
					}
			}
			?>
			</h1>
		</div>
	</body>
</html>
