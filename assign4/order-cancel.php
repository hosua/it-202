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
	function cancelOrder($cust_id, $purchase_id, $conn){
		$sql = "SELECT * FROM customer_purchase_table WHERE
				id = $purchase_id AND
				customer_id = $cust_id;";	
		if (!$query_res = $conn->query($sql)->fetch_assoc()){
			echo "<script> alert('Could not find any matching entries with that customer ID and purchase ID. Please double check that the information entered is correct.')</script>";
			return false;
		} 

		if ($query_res['order_type'] == "in store"){
			echo "<script> 
					alert('A matching order was found, but the order was not an online order. You cannot cancel orders that took place in store.');
				  </script>";
			return false;
		}
		// Delete child first!
		if (!$conn->query("DELETE FROM customer_order_table WHERE purchase_id = ${purchase_id}")){
			echo "<strong> Deleting from customer_order_table failed. </strong>";
			die();
		}
		// Then delete primary.
		if (!$conn->query("DELETE FROM customer_purchase_table WHERE id = ${purchase_id}")){
			echo "<strong> Deleting from customer_purchase_table failed. </strong>";
			die();
		}

		echo "<script> alert('Order #${purchase_id} cancelled successfully.'); </script>";
	}

	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		$customer_id = $_POST["customer-id"];
		$purchase_id = $_POST["purchase-id"];
		
		cancelOrder($customer_id, $purchase_id, $conn);
	}
?>

<script>
	function confirmCancel(){
		$res = confirm("You are about to cancel an online order. Are you sure you want to do this?");
		if (!$res)
			alert("Order was not cancelled.");
		return $res;	
	}
</script>

	<div class='form-box'>
		<h1 class='center'>Cancel Order</h1>
		<form action='order-cancel.php' method='post' onsubmit='return confirmCancel(event)'>
			<div class="form-item">
				<label for="customer-id">Customer's ID #:</label>
				<div style="float: right;">
					<input type="number" id="customer-id" name="customer-id" placeholder="4" onkeypress='return forceNumberInput(event);' required> 
					<p> Required </p>
				</div>
				<br> <br>
			</div>
			<div class="form-item">
				<label for="purchase-id">Purchase ID #:</label>
				<div style="float: right;">
					<input type="number" id="purchase-id" name="purchase-id" placeholder="123" onkeypress='return forceNumberInput(event);' required> 
					<p> Required </p>
				</div>
				<br> <br>
			</div>
			<div class="buttonholder">
				<input type="reset" value="Reset">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
</html>

<script type="text/javascript" src="script.js"></script>
