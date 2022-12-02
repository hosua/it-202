<!DOCTYPE html>
<html>
	<form action="index-insecure.php" method="post">
		<label for="student-name">Student name: </label> <br>
		<input id="student-name" name="student-name" type="text"> <br>
		<input type="submit" value="Submit">
	</form>
</html>

<style>
	table, th, td { border: 1px solid black; }
</style>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$servername = "";
		$username = "";
		$dbpass = "";
		$dbname = "";

		$student_name = "%{$_POST["student-name"]}%";

		$sql = "SELECT * FROM Student WHERE name LIKE \"$student_name\";";
		// $sql = "SELECT * FROM Student WHERE name LIKE ?;";
		// echo $sql;

		$conn = mysqli_connect($servername,$username,$dbpass,$dbname);

		$query_res = $conn->query($sql);
		echo "<table>
				<thead>
					<tr>
						<th>Student Name</th>
						<th>Student ID</th>
						<th>Major</th>
					</tr>
				</thead>
				<tbody>
				";
		while ($row	= $query_res->fetch_assoc()){
			echo "<tr>" .
				 "<td>" . $row["name"] . "</td>" .
				 "<td>" . $row["id"] . "</td>" .
				 "<td>" . $row["major"] . "</td>" .
				 "</tr>";
		}
		echo "	</tbody>
			</table";
	}
?>
