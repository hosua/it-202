<?php 
include 'info.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $sql = "SELECT * FROM Users WHERE";
}
?>
