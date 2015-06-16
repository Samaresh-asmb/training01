<?php
	session_start();
	if(isset($_SESSION['user_name'])){
		session_unset();
		$current_user_id = $_COOKIE['user'];
		$serial_no = $_COOKIE['serial_no'];
		$cur_date = date("Y-m-d");
		date_default_timezone_set('Asia/Kolkata');  // this sets time zone to IST
			$end_time = date('h:i:s a');				//current time
		include("db_connector.php");
		mysql_query("update time_logs set end_time = '$end_time' where sl_no = '$serial_no'");
		header('Location:login.php');
	}else{
		header('Location:login.php');
	}
	
?>