<?php
	session_start();
	$dbserver= "localhost";
	$dbuser= "hoswoo";
	$dbpass = "m1z0m1z0";
	$dbname = "it202";

	$active_page = basename($_SERVER["PHP_SELF"], ".php");

	// This is how to make a .php page unvisitable. 
	// User should never be able to visit this page since it only holds information and functions.
	if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
		header("location: index.php");
	}

	$employee_id = $_SESSION['employee-id'];
	$conn = mysqli_connect($servername,$username,$dbpass,$dbname);
	if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); exit(); } 
?>
