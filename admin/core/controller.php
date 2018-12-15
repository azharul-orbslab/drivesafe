<?php
	include 'config.php';

	class Controller {
		public function __construct() {
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
		}

		public function signIn($user, $pass, $conn) {

			$sql = $conn->prepare("SELECT * FROM administration WHERE username = ?");
			$sql->bind_param("s", $user);
			$sql->execute();
			$res = $sql->get_result();
			$row = $res->fetch_assoc();

			if($user == $row['username'] && $pass == $row['password']) {
				session_start();
              	$_SESSION["admin"] = $row['id'];
				return true;
			} else {
				return false;
			}
		}


		public function signRequest($conn) {
			$sql = $conn->prepare("SELECT * FROM driver WHERE status = 0");
			$sql->execute();
			$res = $sql->get_result();

			return $res;
		}

		public function reporterList($conn) {
			$sql = $conn->prepare("SELECT * FROM reporters");
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

		public function getIncident($conn) {
			$sql = $conn->prepare("SELECT * FROM incident");
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

		public function driverList($conn) {
			$sql = $conn->prepare("SELECT * FROM driver");
			$sql->execute();
			$res = $sql->get_result();

			return $res;
		}

		public function createReporter($name, $user, $pass, $loc, $conn) {
			$sql = $conn->prepare("INSERT INTO reporters (name, username, password, place) VALUES (?, ?, ?, ?)");
			$sql->bind_param("ssss", $name, $user, $pass, $loc);
			
			if($sql->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function addIncidentType($type, $point, $conn) {
			$sql = $conn->prepare("INSERT INTO point_table (type_name, point) VALUES (?, ?)");
			$sql->bind_param("ss", $type, $point);
			
			if($sql->execute()) {
				return true;
			} else {
				return false;
			}
		}
	}

	$ctrl = new Controller;
?>