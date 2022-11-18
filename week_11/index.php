<!DOCTYPE html>
<?php 
include "db-info.php";
ini_set("display_errors", 1); 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); die(); }
?>

<html>
	<form action='index.php' method='POST'>
		<label for='student-id'>Student ID:</label>	
		<input id='student-id' name='student-id' type='number'>
		<input type='submit' value='Search'>
	</form>
</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] === "POST"){

		$student_id = $_POST["student-id"];	
		$sql = "SELECT * FROM Student WHERE	ID = $student_id;";
		$query_res = $conn->query($sql);	

		if (!$query_res->fetch_assoc()){
			echo "<br>INVALID STUDENT ID, PLEASE TRY AGAIN!<br>";
		} else {
			session_start();
			$_SESSION['student-id'] = $student_id;	
			header("location: action.php");
		}
	}
?>
