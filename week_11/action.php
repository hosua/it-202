<!DOCTYPE html>
<?php 
	include "db-info.php";
	session_start();
	ini_set("display_errors", 1); 
	$student_id = $_SESSION["student-id"];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); die(); }
?>
<html>
	<table border="1">
		<tr>
			<th> Name </th>
			<th> ID </th>
			<th> Major </th>
			<th> Course </th>
			<th> Grade </th>
		</tr>
<?php

	$sql = "SELECT Student.Name AS name, Student.ID AS id, Student.Major AS major,
			Transcript.Course AS course, Transcript.Grade as grade 
			FROM Student
			INNER JOIN Transcript ON Student.ID = Transcript.ID AND Student.ID = $student_id;";
	$query_res = $conn->query($sql);	

	if (!$query_res){
		echo "ERROR: " . mysqli_error($query_res);
	} else {
		while ( ($rows = $query_res->fetch_assoc()) ){
			echo "<tr>";
			echo "<td>" . $rows['name'] . "</td>
				  <td>" . $rows['id'] . "</td> 
				  <td>" . $rows['major'] . "</td> 
				  <td>" . $rows['course'] . "</td>
				  <td>" . $rows['grade'] . "</td>";	
			echo "</tr>";
		}	
	}

?>


	</table>
	<form action="index.php"> <input type='submit' value='Home' /> </form>
</html>
