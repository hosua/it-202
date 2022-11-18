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
	function verifyUser($first_name, $last_name, $customer_id, $conn){
		$first_name = strtolower(htmlspecialchars($first_name));
		$last_name = strtolower(htmlspecialchars($last_name));
		$sql = "SELECT * FROM `customer_table` WHERE 
				first_name = LOWER('$first_name') AND 
				last_name = LOWER('$last_name') AND 
				id = $customer_id;";
		$query_res = $conn->query($sql)->fetch_assoc();
		return ($query_res);
	}

	function addPurchase($cust_first_name, $cust_last_name, $cust_id, $emp_id,
							$item_desc, $order_type, $payment_type, $date, $addr, $conn){
		$order_type = str_replace("-", " ", $order_type);
		$purchase_id = rand(20,1000000);

		$sql = "INSERT INTO customer_purchase_table (customer_id, item_desc, purchase_date, order_type, payment_type, id)
			VALUES ($cust_id, '$item_desc', '$date', '$order_type', '$payment_type', $purchase_id);";
		
		if (!$conn->query($sql)){
			echo("Error: " . $mysqli->error);
			return 0;
		}

		$sql = "INSERT INTO customer_order_table (salesperson_id, customer_id, purchase_id, shipping_address) 
				VALUES ($emp_id, $cust_id, $purchase_id, '$addr');";
		if (!$conn->query($sql)){
			echo("Error: " . $mysqli->error);
			return 0;
		}
		return $purchase_id;
	}
?>

	<div class=form-box>

 	<?php
		if ($_SERVER['REQUEST_METHOD'] === "POST"){
			$first_name = htmlspecialchars($_POST["first-name"]);
			$last_name = htmlspecialchars($_POST["last-name"]);
			$customer_id = $_POST["customer-id"];
			$item_desc = $_POST["item-desc"];
			$purchase_date = $_POST["purchase-date"];
			$payment_type = $_POST["payment-type"];
			$order_type = $_POST["order-type"];
			$shipping_address = "";
			if (isset($_POST["shipping-address"]))
				$shipping_address = $_POST["shipping-address"];

			if (verifyUser($first_name, $last_name, $customer_id, $conn)){
				if ( !($purchase_id = addPurchase($first_name, $last_name, $customer_id, $employee_id,
					$item_desc, $order_type, $payment_type, $purchase_date, $shipping_address, $conn)) ){
					echo "<script>
							alert('There was a SQL error. Perhaps your input was formatted incorrectly.');
						  </script>";
				} else {
					echo "<script>
							alert('Your order for \"${item_desc}\" was placed. Your order number is ${purchase_id}.');
						  </script>";
				}

			} else {
				echo "<script>
						if (confirm('Customer account could not be found. You must create an account before you can purchase a book. Would you like to be redirected to the account creation page?')){
							window.location.href='create-customer-account.php';
						}
					  </script>";
			}
		}	
	?>
		<h1 class="center"> Purchase Form </h1>
		<p> Note: The salesperson ID will automatically be assigned to the <br> 
			ID of the user that is logged in when a purchase is made. </p>
		<form action="book-purchase.php" method="post">
			<div class="form-item">
				<label for="first-name">Customer's First Name:</label>
				<div style="float: right;">
					<input id="first-name" name="first-name" placeholder="Marshall" required> 
					<p> Required </p>
				</div>
				<br> <br>
			</div>
			<div class="form-item">
				<label for="last-name">Customer's Last Name:</label>
				<div style="float: right;">
					<input id="last-name" name="last-name" placeholder="Mathers" required>
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="customer-id">Customer's ID:</label>
				<div style="float: right;">
					<input id="customer-id" name="customer-id" placeholder="123" onkeypress='return forceNumberInput(event);' required>
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="item-desc">Item Description:</label>
				<div style="float: right;">
					<input type="item-desc" id="item-desc" name="item-desc" placeholder="Pillars of the Earth" required>
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="purchase-date">Purchase Date &amp; Time:</label>
				<div style="float: right;">
					<input type="datetime-local" id="purchase-date" name="purchase-date" placeholder="2022-09-16 04:20:44" required>
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="payment-type">Payment Type:</label>
				<div style="float: right;">
					<span style="margin-right: 80px;"> 
						Cash <input type="radio" id="payment-type" name="payment-type" value="cash"> 
						Credit <input type="radio" id="payment-type" name="payment-type" value="credit" checked> 
					</span>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="order-type">Order Type:</label>
				<div style="float: right;">
					<span style="margin-right: 80px;"> 
						In store <input type="radio" id="order-type" name="order-type" value="in-store"> 
						Online <input type="radio" id="order-type" name="order-type" value="online" checked> 
					</span>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label style="float: left;" for="shipping-address">Shipping Address:</label>
				<div style="float: left;">
					<input id="shipping-address" name="shipping-address" placeholder="123 Street City, ST 12345">
					<p> Required </p>
				</div>
			</div>
			<br> <br>
			<div class="buttonholder">
				<input type="reset" value="Reset">
				<input type="submit" value="Submit" onclick="return checkDescription()">
			</div>
		</form>

	</div>
</html>

<script type="text/javascript" src="script.js"></script>

