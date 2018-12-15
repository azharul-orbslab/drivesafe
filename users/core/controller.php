<?php
	include 'config.php';

	class Controller {
		public function __construct() {
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
		}

		public function srcDriver($query, $conn) {
			$query = "%$query%";
			$sql = $conn->prepare("SELECT * FROM driver WHERE name LIKE ? OR vehicles_num LIKE ?");
		 	$sql->bind_param("ss", $query, $query);
		 	$sql->execute();
		 	$res = $sql->get_result();
			 
			return $res;
		}
	}

	$ctrl = new Controller;
?>