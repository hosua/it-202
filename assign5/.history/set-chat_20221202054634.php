<?php
include 'info.php';
$sql = "SELECT * FROM User WHERE name = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $student_name);
$stmt->execute();
function getChat($user){
}
?>