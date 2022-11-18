<?php session_start();
include "ui-core.php";
ini_set("display_errors", 1); // debugging
$active_page = basename($_SERVER["PHP_SELF"], ".php");

if (!isset($_SESSION['employee-id'])) // Redirect to login if user is not logged in
	header("location: index.php");

$employee_id = $_SESSION['employee-id'];
$employee_first_name = $_SESSION['employee-first-name'];
$employee_last_name = $_SESSION['employee-last-name'];

$conn = mysqli_connect($servername,$username,$dbpass,$dbname);
if (mysqli_connect_errno())
{ echo "Failed to connect to MySQL: " . mysqli_connect_error(); exit(); } 
?>

<link rel="stylesheet" type="text/css" href="styles.css"/>
<html>
	<?php printTopNav(); ?>
	<?php
		function checkExistingUsers($cust_first_name, $cust_last_name, $conn){
			$sql = "SELECT * FROM customer_table WHERE 
					first_name = LOWER('$cust_first_name') AND
					last_name = LOWER('$cust_last_name');";	
			if ( ($query_res = $conn->query($sql)->fetch_assoc()) ){
				$cust_id = $query_res['id'];
				echo "<script> alert('Could not add \"${cust_first_name} ${cust_last_name}\" because they already exist in the database under the ID #${cust_id}.'); </script>";
				return false;
			}

			$sql = "INSERT INTO customer_table (first_name, last_name) VALUES
					('$cust_first_name', '$cust_last_name')";
			if ( !($query_res = $conn->query($sql)) ){
				echo "<strong> Error: SQL query failed. </strong>";	
				die();
			}

			$sql = "SELECT * FROM customer_table WHERE 
					LOWER(first_name) = LOWER('$cust_first_name') AND 
					LOWER(last_name) = LOWER('$cust_last_name');";
			
			if ( ($query_res = $conn->query($sql)->fetch_assoc()) ){
				$cust_id = $query_res['id'];	
			}			

			echo "<script> alert('Registered the user \"${cust_first_name} ${cust_last_name}\" to ID #${cust_id} successfully.'); </script>";
			return true;
		}	
		if ($_SERVER['REQUEST_METHOD'] === "POST"){
			$customer_first_name = $_POST["first-name"];
			$customer_last_name = $_POST["last-name"];
			
			checkExistingUsers($customer_first_name, $customer_last_name, $conn);
		}
	?>

	<div class='form-box'>
		<h1 class='center'>Create Customer Account</h1>
		<form action='create-customer-account.php' method='post'>
			<div class="form-item">
				<label for="first-name">Customer's First Name:</label>
				<div style="float: right;">
					<input type="text" id="first-name" name="first-name" placeholder="John" required> 
					<p> Required </p>
				</div>
				<br> <br>
			</div>
			<div class="form-item">
				<label for="last-name">Customer's Last Name:</label>
				<div style="float: right;">
					<input type="text" id="last-name" name="last-name" placeholder="Cena" required> 
					<p> Required </p>
				</div>
				<br> <br>
			</div>
			<p> <strong> Note: </strong> Customers will be automatically assigned an ID upon <br> registration. </p>
			<div class="buttonholder">
				<input type="reset" value="Reset">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>

</html>

<script type="text/javascript" src="script.js"></script>
