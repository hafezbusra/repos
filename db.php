<?php
class Db {
	
	/*
	// view calendar
	static function getEvents($mysqli, $username){
		if ($stmt = $mysqli->prepare('SELECT * FROM event WHERE date >= CURDATE() AND id IN (SELECT event FROM attendance WHERE member = ?) ORDER BY date')){
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $rows;
		}
	}
	
	// view event	
	static function getEvent($mysqli, $id){
		if ($stmt = $mysqli->prepare('SELECT * FROM event WHERE id = ?')){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row;
		}
	}
	
	// add event
	
	
	// attending event
	
	
	static function notAttending($mysqli, $event, $username){
		if ($stmt = $mysqli->prepare('SELECT COUNT(member) AS Total FROM attendance WHERE event = ? AND member = ?')){
			$stmt->bind_param('is', $event, $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row['Total'] < 1;
		}
	}
	*/


	//check user id

	static function checkidUser($mysqli, $username){
		if ($stmt = $mysqli->prepare('SELECT user_id FROM customer WHERE username = ?')){
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row['user_id'] ;
		}
	}

	//check station ID

	static function checkidStation($mysqli, $station_name){
		if ($stmt = $mysqli->prepare('SELECT station_id FROM station WHERE station_name = ?')){
			$stmt->bind_param('s', $station_name);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row['station_id'] ;
		}
	}
	

	//login
	static function getPassword($mysqli, $username){
		if ($stmt = $mysqli->prepare('SELECT password FROM customer WHERE username = ?')){
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row['password'];
		}
	}
	
	
	//sign up
	
	// check if username has been registered
	static function hasUser($mysqli, $username){
		if ($stmt = $mysqli->prepare('SELECT COUNT(*) AS Total FROM customer WHERE username = ?')){
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row['Total'] > 0;
		}
	}
	
	// signup
	static function insertUser($mysqli,$username, $password ,$hp_no ,$address){
		if ($stmt = $mysqli->prepare('INSERT INTO customer(username, password ,hp_no ,address) values ( ? ,? ,? ,?)')){
			$stmt->bind_param('ssss',$username, $password ,$hp_no ,$address);
			if ($stmt->execute()){
				return true;
			} else {
				return false;
			}
		}
	}
	
	//logout
	
	
	//admin
	

	
	//update bike
		//add bike
		static function addBike($mysqli, $bicycle_type,$station_id){ 
    if ($stmt = $mysqli->prepare('INSERT INTO bicycle (bicycle_type, station_id) VALUES (?, ?)')){
        $stmt->bind_param('si', $bicycle_type, $station_id);
        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}



		
		//delete bike
		static function deleteBike($mysqli,$bicycle_id){
			if($stmt = $mysqli->prepare('DELETE FROM bicycle WHERE bicycle_id = ?')){
				$stmt->bind_param('i',$bicycle_id);
				if($stmt->execute()){
					return true;
				}else{
					return false;
				}
			}
		}

		

		


		

	/*
		// show list bike
			// view attendees
			static function getListBike($mysqli){ //taktau
		if ($stmt = $mysqli->prepare('SELECT * FROM bicycle ')){
			$stmt->execute();
			$result = $stmt->get_result();
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $rows;
		}
	}
		*/	
		
	//top up
	static function addTopup($mysqli, $user_id ,$topup_amount){
		if ($stmt = $mysqli->prepare('INSERT INTO topup (user_id ,topup_amount) VALUES (?,?)')){
			$stmt->bind_param('id', $user_id ,$topup_amount);
			if ($stmt->execute()){
				return $mysqli->insert_id;
			} else {
				return 0;
			}
		}
	}
	/*
	

	//view report
	static function getListReport($mysqli){  //taktau
		if ($stmt = $mysqli->prepare('SELECT * FROM report ')){
			$stmt->execute();
			$result = $stmt->get_result();
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $rows;
		}
	}
	
	//view student rental history
		static function getRentalHistory($mysqli, $user_id){ //taktau
		if ($stmt = $mysqli->prepare('SELECT  bicycle_id ,rent_amount ,rent_date FROM rent WHERE user_id =')){
			$stmt->bind_param('is', $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $rows;
		}
	}
	
	
	*/
	//user
	
	//report
	static function addReport($mysqli, $bicycle_id ,$parking_id,$station_id,$report,$user_id){
		if ($stmt = $mysqli->prepare('INSERT INTO report ( bicycle_id , parking_id, station_id, report, user_id) VALUES (?,?,?,?,?)')){
			$stmt->bind_param('iiisi',  $bicycle_id ,$parking_id,$station_id,$report,$user_id);
			if ($stmt->execute()){
				return true;
			} else {
				return false;
			}
		}
	}
	
	
	//unlock lock
	
	//topup
		//show blance
		
		// topup
	
	//setting
		//update


	static function updateSettingAddress($mysqli,$user_id, $address){
		if ($stmt = $mysqli->prepare('UPDATE customer
			SET address = ? WHERE user_id = ?') ){
			$stmt->bind_param('si',$address,$user_id);
			if ($stmt->execute()){
				return true;
			} else {
				return false;
			}
		}
	}

	static function updateSettingHp($mysqli,$user_id, $hp_no){
		if ($stmt = $mysqli->prepare('UPDATE customer
			SET hp_no = ? WHERE user_id = ?') ){
			$stmt->bind_param('si',$hp_no,$user_id);
			if ($stmt->execute()){
				return $mysqli->insert_id;
			} else {
				return 0;
			}
		}
	}

	static function updateSettingUsername($mysqli,$user_id, $username){
		if ($stmt = $mysqli->prepare('UPDATE customer
			SET username = ? WHERE user_id = ?') ){
			$stmt->bind_param('si',$username,$user_id);
			if ($stmt->execute()){
				return $mysqli->insert_id;
			} else {
				return 0;
			}
		}
	}

	static function updateSettingPassword($mysqli,$user_id, $password){
		if ($stmt = $mysqli->prepare('UPDATE customer
			SET password = ? WHERE user_id = ?') ){
			$stmt->bind_param('si',$password,$user_id);
			if ($stmt->execute()){
				return $mysqli->insert_id;
			} else {
				return 0;
			}
		}
	}
		 
		
		//reset password */
	
}

?>