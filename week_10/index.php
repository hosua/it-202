<?php

// This code has 10 errors. Find and fix them.
$name = $_GET['name'];

if (isset ($name)) {
	ini_set('display_errors', 1);
	$con = mysqli_connect("localhost", "user", "pass", "it202");
	$sql = "SELECT * FROM `Client Table` WHERE Name='$name'";

	$result = mysqli_query($con,$sql);
	$rows = mysqli_num_rows($result);
	if($rows = 1) {
		echo $name;
	}
}

?>
