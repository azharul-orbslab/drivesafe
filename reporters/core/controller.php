<?php
	include 'config.php';

	class Controller {
		public function __construct() {
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
		}

		public function incident($vehicles_num, $driver_lic_num, $incident_type_id, $place, $summary, $reporter_id, $conn) {
			$pass = md5($pass);
			
			date_default_timezone_set("Asia/Dhaka");
			$date = date("Y-m-d");
			$time = date("h:i:sa");

			$sql = $conn->prepare("INSERT INTO incident (vehicles_num, driver_lic_num, incident_type_id, place, summary, time, date, reporter_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$sql->bind_param("ssssssss", $vehicles_num, $driver_lic_num, $incident_type_id, $place, $summary, $time, $date, $reporter_id);
			
			if($sql->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function reducePoint($veh, $currentPoints, $incType, $conn) {
			$point = $this->getIncidentPointById($incType, $this->conn);
			$totalPoint = $currentPoints - $point;

			$sql = $conn->prepare("UPDATE driver SET points = ? WHERE vehicles_num = ?");
			$sql->bind_param("ss", $totalPoint, $veh);
			$sql->execute();
		}

		public function r_signIn($user, $pass, $conn) {

			$sql = $conn->prepare("SELECT * FROM reporters WHERE username = ?");
			$sql->bind_param("s", $user);
			$sql->execute();
			$res = $sql->get_result();
			$row = $res->fetch_assoc();

			if($user == $row['username'] && $pass == $row['password']) {
				session_start();
              	$_SESSION["reporter"] = $row['id'];
				return true;
			} else {
				return false;
			}
		}

		public function getReporterById($id, $conn) {
			$sql = $conn->prepare("SELECT * FROM reporters WHERE id = ?");
			$sql->bind_param("s", $id);
		 	$sql->execute();
		 	$res = $sql->get_result();
		 	$row = $res->fetch_assoc();
			 
			return $row;
		}

		public function getDriver($conn) {
			$sql = $conn->prepare("SELECT * FROM driver");
		 	$sql->execute();
		 	$res = $sql->get_result();
			 
			return $res;
		}

		public function getDriverById($id, $conn) {
			$sql = $conn->prepare("SELECT * FROM driver WHERE id = ?");
		 	$sql->bind_param("s", $id);
		 	$sql->execute();
		 	$res = $sql->get_result();
		 	$row = $res->fetch_assoc();
			 
			return $row;
		}

		public function srcDriver($query, $conn) {
			$query = "%$query%";
			$sql = $conn->prepare("SELECT * FROM driver WHERE name LIKE ? OR vehicles_num LIKE ?");
		 	$sql->bind_param("ss", $query, $query);
		 	$sql->execute();
		 	$res = $sql->get_result();
			 
			return $res;
		}

		public function getPoints($conn) {
			$sql = $conn->prepare("SELECT * FROM point_table");
		 	$sql->execute();
		 	$res = $sql->get_result();
			 
			return $res;
		}

		public function getNumRepById($id, $conn) {
			$sql = $conn->prepare("SELECT * FROM incident WHERE reporter_id = ?");
			$sql->bind_param("s", $id);
		 	$sql->execute();
		 	$res = $sql->get_result();
		 	$row = $res->num_rows;
			 
			return $row;
		}

		public function getRepById($id, $conn) {
			$sql = $conn->prepare("SELECT * FROM incident WHERE reporter_id = ?");
			$sql->bind_param("s", $id);
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
		public function getIncidentByVehicle($vehicles_num, $conn) {
			$sql = $conn->prepare("SELECT * FROM incident WHERE vehicles_num = ?");
		 	$sql->bind_param("s", $vehicles_num);
		 	$sql->execute();
		 	$res = $sql->get_result();
			 
			return $res;
		}

		public function updateProfile($id, $name, $user, $place, $conn) {

			$sql = $conn->prepare("UPDATE reporters SET name = ?, username = ?, place = ? WHERE id = ?");
			$sql->bind_param("ssss", $name, $user, $place, $id);
			
			if($sql->execute()) {
				return true;
			} else {
				return false;
			}
		}
	}

	$ctrl = new Controller;
?>