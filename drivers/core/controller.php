<?php
	include 'config.php';

	class Controller {
		public function __construct() {
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
		}

		public function signUp($name, $pass, $mob, $owner_num, $veh_num, $lic, $conn) {

			$sql = $conn->prepare("INSERT INTO driver (name, mobile_num, password, owner_mob_num, vehicles_num, licence_num, points, status) VALUES (?, ?, ?, ?, ?, ?, 500, 0)");
			$sql->bind_param("ssssss", $name, $mob, $pass, $owner_num, $veh_num, $lic);
			
			if($sql->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function signIn($veh_num, $pass, $conn) {

			$sql = $conn->prepare("SELECT * FROM driver WHERE vehicles_num = ?");
			$sql->bind_param("s", $veh_num);
			$sql->execute();
			$res = $sql->get_result();
			$row = $res->fetch_assoc();

			if($user == $row['veh_num'] && $pass == $row['password']) {
				session_start();
              	$_SESSION["driver"] = $row['id'];
				return true;
			} else {
				return false;
			}
		}

		public function getProfile($id, $conn) {
			$sql = $conn->prepare("SELECT * FROM driver WHERE id = ?");
		 	$sql->bind_param("s", $id);
		 	$sql->execute();
		 	$res = $sql->get_result();
			$row = $res->fetch_assoc();
			 
			return $row;
		}

		public function updateProfile($id, $name, $mob, $pass, $conn) {

			$sql = $conn->prepare("UPDATE driver SET name = ?, mobile_num = ?, password = ? WHERE id = ?");
			$sql->bind_param("ssss", $name, $mob, $pass, $id);
			
			if($sql->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function getDriverById($id, $conn) {
			$sql = $conn->prepare("SELECT * FROM driver WHERE id = ?");
		 	$sql->bind_param("s", $id);
		 	$sql->execute();
		 	$res = $sql->get_result();
		 	$row = $res->fetch_assoc();
			 
			return $row;
		}

		public function getIncidentByVehicle($vehicles_num, $conn) {
			$sql = $conn->prepare("SELECT * FROM incident WHERE vehicles_num = ?");
		 	$sql->bind_param("s", $vehicles_num);
		 	$sql->execute();
		 	$res = $sql->get_result();
			 
			return $res;
		}

		public function getIncidentTypeById($type_id, $conn) {
			$sql = $conn->prepare("SELECT type_name FROM point_table WHERE type_id = ?");
		 	$sql->bind_param("s", $type_id);
		 	$sql->execute();
		 	$res = $sql->get_result();
		 	$row = $res->fetch_assoc();
			 
			echo $row['type_name'];
		}

		public function getIncidentPointById($type_id, $conn) {
			$sql = $conn->prepare("SELECT point FROM point_table WHERE type_id = ?");
		 	$sql->bind_param("s", $type_id);
		 	$sql->execute();
		 	$res = $sql->get_result();
		 	$row = $res->fetch_assoc();
			 
			echo $row['point'];
		}

		public function getPoints($conn) {
			$sql = $conn->prepare("SELECT * FROM point_table");
		 	$sql->execute();
		 	$res = $sql->get_result();
			 
			return $res;
		}
	}

	$ctrl = new Controller;
?>