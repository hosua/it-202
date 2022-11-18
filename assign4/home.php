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
if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); exit(); } 
?>

<link rel="stylesheet" type="text/css" href="styles.css"/>
<html>
	<?php printTopNav(); ?>

<?php
	// Makes DB connection
	echo "
			<div class='form-box'>
				<p> Hello, ${employee_first_name} ${employee_last_name}. <br> Please use the navigation buttons up top to perform queries.</p>
					<!--
					<form action='redir-hub.php' method='POST'>
						<label for='transaction-opt'>Select a Transaction:</label>
						<select name='transaction-opt' id='transaction-opt'>
							<option value='book-seller-acc-search'>Search a book seller's accounts</option>
							<option value='book-purchase'>Customer's book purchase</option>
							<option value='book-return'>Customer's book return</option>
							<option value='order-update'>Update a customer's book order</option>
							<option value='order-cancel'>Cancel a customer's book order</option>
							<option value='book-search'>Search for a book</option>
							<option value='customer-acc-create'>Create new customer account</option>
						</select>
						<input type='submit' value='Go'>
					</form>
					<form action='logged-out.php'>
						<input type='submit' value='Log out' />
					</form>
					-->
			</div>";

?>

</html>

