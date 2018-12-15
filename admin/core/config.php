<?php
	include 'language.php';
	session_start();

	$conn = new mysqli($lang['db_server'], $lang['db_usr'], $lang['db_pass'], $lang['db_name']);
?>