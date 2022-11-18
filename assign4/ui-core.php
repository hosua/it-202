<?php
	session_start();
	$servername = "";
	$username = "";
	$dbpass = "";
	$dbname = "";

	$active_page = basename($_SERVER["PHP_SELF"], ".php");

	// This is how to make a .php page unvisitable. 
	// User should never be able to visit this page since it only holds information and functions.
	if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
		header("location: home.php");
	}

	$employee_id = $_SESSION['employee-id'];
	$conn = mysqli_connect($servername,$username,$dbpass,$dbname);
	if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); exit(); } 

	function showErrPage(){ // No longer using this.
		echo <<<EOF
			<link rel="stylesheet" type="text/css" href="styles.css"/>
			<html>
				<div class="form-box">
					<p> You must be logged in to see this page! </p>
				<form method="POST" action="index.php">
					<input type="submit" value="Home"/>
				</form>
				</div>	
			</html>
EOF;
		die();
	}	
	
	function printTopNav(){
		global $employee_first_name, $employee_last_name, $employee_id, $active_page;
		echo <<<EOL
			<div class="topnav">
				<div class="navtitle">
					The Story Keeper <br>
					  Bookstore
				</div>
EOL;
		if (isset($_SESSION["employee-id"])){
				echo "<span> Logged in as:<br> <strong>${employee_first_name} ${employee_last_name}</strong><br>
						ID: <strong>${employee_id}</strong>
						<form action='logged-out.php'>
							<input type='submit' value='Log out' />
						</form>
					</span>";
		} else {
			echo "<span> Not logged in. </span>";	
		}

		// This is horrible, there has to be a better way to do this.
		echo "<a class=\""; ?> <?php echo ($active_page == 'home') ? 'active"' : '"'; ?> <?php echo "href='home.php'>Home</a>
			  <a class=\"" ?> <?php echo ($active_page == 'search-db') ? 'active"' : '"' ?> <?php echo "href='search-db.php'>Search Database</a>
			  <a class=\"" ?> <?php echo ($active_page == 'book-purchase') ? 'active"' : '"' ?> <?php echo "href='book-purchase.php'>Purchase</a>
			  <a class=\"" ?> <?php echo ($active_page == 'book-return') ? 'active"' : '"' ?> <?php echo "href='book-return.php'>Return</a>
			  <a class=\"" ?> <?php echo ($active_page == 'order-update') ? 'active"' : '"' ?> <?php echo "href='order-update.php'>Update Order</a>
			  <a class=\"" ?> <?php echo ($active_page == 'order-cancel') ? 'active"' : '"' ?> <?php echo "href='order-cancel.php'>Cancel Order</a>
			  <a class=\"" ?> <?php echo ($active_page == 'create-customer-account') ? 'active"' : '"' ?> <?php echo "href='create-customer-account.php'>Create Customer Account</a>
			</div>";
	}

?>
