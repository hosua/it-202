<link rel="stylesheet" type="text/css" href="styles.css"/>
<html>
<?php
	include "ui-core.php";
	session_start();
	ini_set("display_errors", 1); // debugging
	$active_page = basename($_SERVER["PHP_SELF"], ".php");

	if (isset($_SESSION['employee-id'])){
		session_destroy();
		unset($_SESSION['employee-first-name']);
		unset($_SESSION['employee-last-name']);
		unset($_SESSION['employee-id']);
	} 
	header("location: index.php");
?>


</html>
