<?php
include 'info.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    function verifyUser($user, $pass){
        global $conn;

        $sql = "SELECT * FROM Users WHERE LOWER(username) = LOWER(?) AND pass = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $user, $pass);
        $stmt->execute();
        $query_res = $stmt->get_result();

        if (mysqli_num_rows($query_res) == 0) {
            echo "<p> Invalid user </p>";
            return false;
        }
        echo "<p> Success </p>";
        return true;
    }
    $valid = verifyUser($user, $pass);
}
header('location: index.php');
?>