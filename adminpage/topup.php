<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Topup</title>
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

				$topup_amount = $_POST['topup_amount'];
				$user_id = $_POST['user_id'];
				//$user_balance = $_POST['topup_amount'];
				
					
					if (Db::addTopup($mysqli, $user_id,$topup_amount)){
						// cana nak alert kuar id bike
						Util::alert('Successfully topup!'); 
					}
					
					//Db:updateBalance($mysqli, $topup_amount ,$user_id);
			}
			?>
			</h1>
		</div>
	</body>
</html>