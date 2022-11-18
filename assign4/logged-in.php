<?php session_start();
include "ui-core.php";
ini_set("display_errors", 1); // debugging
$active_page = basename($_SERVER["PHP_SELF"], ".php");
?>

<link rel="stylesheet" type="text/css" href="styles.css"/>
<html>

<?php
	function verifyUser($first_name, $last_name, $password, $user_id, $conn){
		$sql = "SELECT * FROM salesperson_table WHERE
				first_name = LOWER('$first_name') AND
				last_name = LOWER('$last_name') AND
				passwd = '$password' AND
				id = '$user_id';";	

		$query_res = $conn->query($sql)->fetch_assoc();
		return ($query_res) ? true : false;
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){

		$first_name = ucfirst(strtolower(htmlspecialchars($_POST["first-name"])));
		$last_name = ucfirst(strtolower(htmlspecialchars($_POST["last-name"])));
		$password = htmlspecialchars($_POST["password"]);
		$user_id = htmlspecialchars($_POST["user-id"]);
		$phone_num = htmlspecialchars($_POST["phone-number"]);
		$email = htmlspecialchars($_POST["email"]);

		$conn = mysqli_connect($servername,$username,$dbpass,$dbname);
		if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); exit(); } 

		if (!verifyUser($first_name, $last_name, $password, $user_id, $conn)){
				echo <<<EOL
					<div class='form-box'>
						<p>Invalid login info, please try again.</p>
							<form>
								<input type="button" value="Go back" onclick="history.back()">
							</form>
					</div>
EOL;
		} else {
			$_SESSION['employee-id'] = $user_id;
			$_SESSION['employee-first-name'] = $first_name;
		   	$_SESSION['employee-last-name'] = $last_name;	
			echo"<div class='form-box'>
					<p>Welcome ${first_name} ${last_name}!</p>
					<p> Redirecting you to the home page... </p>
					<form action='home.php'>
						<input type='submit' value='Home' />
					</form>
				 </div>";
			header("refresh:3;url=home.php");
		}
	} else {
		if (!isset($_SESSION['employee-id'])) // Redirect to login if user is not logged in
			header("location: index.php");
	}

?>

</html>
