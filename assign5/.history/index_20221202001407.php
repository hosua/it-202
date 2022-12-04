<?php 
include 'info.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    // $sql = "SELECT * FROM Users WHERE username = \"$user\" AND pass = \"$pass\"";
    $sql = "SELECT * FROM Users WHERE username = ? AND pass = ?";
}
?>

<html>
    <form>
        <label for=user>Username: </label>
        <input type=text id=user name=user>
        <br> <br>
        <label for=pass>Password: </label>
        <input type=password id=pass name=pass>
        <input type="submit" value="Log in">
    </form>


</html>