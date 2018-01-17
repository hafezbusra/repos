<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Delete Bicycle</title>
	</head>
	<body>
		<div>
			<h1>
			<?php
			require_once('../connection.php');
			require_once('../db.php');
			require_once('../util.php');

			// if the method is POST
			if ($_POST){
					echo 'a';
				$bicycle_id=$_POST['bicycle_id'];
	
					if (Db::deleteBike($mysqli, $bicycle_id)){
						// cana nak alert kuar id bike
						Util::alert('Successfully delete bicycle!','http://localhost/page/adminpage/intro.html'); 
					} 
			}
			?>
			</h1>
		</div>
	</body>
</html>