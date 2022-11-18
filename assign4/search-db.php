<?php session_start();
include "ui-core.php";
ini_set("display_errors", 1); // debugging

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

	<div class=form-box>
<?php
//Makes DB connection

function queryEmployee($emp_id, $conn){
	echo <<<EOL
			<!-- <h1 class="center"> The Story Keeper Bookstore </h1> -->
			<h1 class="center"> Bookstore Database </h1>
		<br>
EOL;

	$sql = "SELECT st.first_name AS salesperson_first_name, st.last_name AS salesperson_last_name, st.id AS salesperson_id,
			st.phone_number, st.email, 
			ct.first_name AS customer_first_name, ct.last_name AS customer_last_name, ct.id AS customer_id, 
			cp.item_desc, cp.payment_type, cp.order_type, 
			co.shipping_address, cp.id AS purchase_id
			FROM salesperson_table AS st
			INNER JOIN customer_order_table AS co ON st.id = co.salesperson_id 
			INNER JOIN customer_table AS ct ON ct.id = co.customer_id
			INNER JOIN customer_purchase_table AS cp ON cp.id = co.purchase_id
			WHERE salesperson_id = $emp_id;";



	$query_res = $conn->query($sql);
	echo <<<EOL
				<table>
					<thead>
						<tr>
							<th>Salesperson First Name</th>
							<th>Salesperson Last Name</th>
							<th>Salesperson ID </th>
							<th>Salesperson Phone Number</th>
							<th>Salesperson Email</th>
							<th>Customer First Name</th>
							<th>Customer Last Name</th>
							<th>Customer ID</th>
							<th>Item Description</th>
							<th>Payment Type</th>
							<th>Order Type</th>
							<th>Shipping Address</th>
							<th>Order ID</th>
						</tr>
					</thead>
EOL;

	while ($row = $query_res->fetch_assoc()){
		// echo $row["customer_first_name"] . "<br>";
		echo "<tr>" .
			"<td>" . $row["salesperson_first_name"] . "</td>" . 
			"<td>" . $row["salesperson_last_name"] . "</td>" . 
			"<td>" . $row["salesperson_id"] . "</td>" .
			"<td>" . $row["phone_number"] . "</td>" . 
			"<td>" . $row["email"] . "</td>" . 
			"<td>" . $row["customer_first_name"] . "</td>" .
			"<td>" . $row["customer_last_name"] . "</td>" . 
			"<td>" . $row["customer_id"] . "</td>" . 
			"<td>" . $row["item_desc"] . "</td>" .
			"<td>" . $row["payment_type"] . "</td>" .
			"<td>" . $row["order_type"] . "</td>" . 
			"<td>" . $row["shipping_address"] . "</td>" . 
			"<td>" . $row["purchase_id"] . "</td>" .
			"</tr>";

	}
} // End queryEmployee()

// Check if emp-id is set before attempting to access the array
(isset($_POST['emp-id'])) ? $emp_id = $_POST['emp-id'] : $emp_id = null;

// Auto run query for the user that's logged in if form submitted, otherwise query the form input
(!isset($emp_id)) ? queryEmployee($employee_id, $conn) : queryEmployee($emp_id, $conn);
?>
	<span style="">
		<form action='search-db.php' method='POST'>
			<label for='emp-id'>Enter Employee ID:</label>
			<input id='emp-id' name='emp-id' type='number' min=10000000 max=99999999 placeholder="10000000"
				title="This page will search for the logged in user by default. To search other employee records, enter their ID in this form."
				onkeypress='return forceNumberInput(event);'>
			<input type='submit' value='Search Records'>
		</form>
	</span>
	</div>
</html>

<script type="text/javascript" src="script.js"></script>



