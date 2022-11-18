<link rel="stylesheet" type="text/css" href="../styles.css"/>
<html>
<?php
		ini_set("display_errors", 1); // debugging
		//Makes DB connection

		$db_type = htmlspecialchars($_GET["db-type"]);

		$servername = "";
		$username = "";
		$password = "";
		$dbname = "";
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		} else {
			// Customer DB output
			if ($db_type == "customer"){
				$sql = "
					SELECT customer_purchase_table.purchase_id, customer_table.first_name, customer_table.last_name, customer_table.customer_id, 
					customer_purchase_table.item_desc, customer_purchase_table.purchase_date, customer_purchase_table.payment_type, customer_purchase_table.order_type, customer_order_table.shipping_address
					FROM customer_table 
					INNER JOIN customer_order_table ON customer_table.customer_id = customer_order_table.customer_id 
					INNER JOIN customer_purchase_table ON customer_order_table.purchase_id = customer_purchase_table.purchase_id;
				";
				$res = $conn->query($sql);
				echo "
				<div class=\"title-box\">
					<h1> CUSTOMER DB </h1>
				</div>
				<div class=\"table-box\">
					<table>
						<thead>
							<tr>
								<th>Order ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Customer ID</th>
								<th>Item Description</th>
								<th>Purchase Date</th>
								<th>Payment Type</th>
								<th>Order Type</th>
								<th>Shipping Address</th>
							</tr>
						</thead>";

				if ($res->num_rows > 0){
					while ($row = $res->fetch_assoc()){
						echo "<tr>" .
							 "<td>" . $row["purchase_id"] . "</td>" . 
							 "<td>" . $row["first_name"] . "</td>" .
							 "<td>" . $row["last_name"] . "</td>" .
							 "<td>" . $row["customer_id"] . "</td>" . 
							 "<td>" . $row["item_desc"] . "</td>" .
							 "<td>" . $row["purchase_date"] . "</td>" .
							 "<td>" . $row["payment_type"] . "</td>" .
							 "<td>" . $row["order_type"] . "</td>" .
							 "<td>" . $row["shipping_address"] . "</td>" .
							 "</tr>";
					}
				} else {
					echo "No queries found";	
				}
			} else if ($db_type == "book-seller") {
				$sql = "SELECT * FROM salesperson_table;";
				$res = $conn->query($sql);
				echo "
				<div class=\"title-box\">
					<h1> BOOK SELLER DB </h1>
				</div>
				<div class=\"table-box\">
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Password</th>
								<th>Phone Number</th>
								<th>Email</th>
							</tr>
						</thead>";

				if ($res->num_rows > 0){
					while ($row = $res->fetch_assoc()){
						echo "<tr>" .
							 "<td>" . $row["salesperson_id"] . "</td>" . 
							 "<td>" . $row["first_name"] . "</td>" .
							 "<td>" . $row["last_name"] . "</td>" .
							 "<td>" . $row["passwd"] . "</td>" . 
							 "<td>" . $row["phone_number"] . "</td>" .
							 "<td>" . $row["email"] . "</td>" .
							 "</tr>";
					}
				} else {
					echo "No queries found";	
				}
			}
		}
?>
	</table>
	<input class="input-button" type="button" onclick="location.href='../index.html';" value="Home">
	</div>
</html>

<script type="text/javascript" src="../script.js"></script>


