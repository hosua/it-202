<?php
include 'info.php';
ini_set("display_errors", 1);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM Users WHERE LOWER(username) = LOWER(?) AND pass = ?";
    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, $pass);
    $stmt->execute();
    $query_res = $stmt->get_result();

    if (mysqli_num_rows($query_res) == 0) {
        $_SESSION['err_msg'] = "Invalid username or password.";
    } else {
        $_SESSION['user'] = $user;
        if (isset($_SESSION['err_msg'])) {
            unset($_SESSION['err_msg']);
        }
    }
}
header('location: index.php');

?>

<link rel="stylesheet" href="styles.css">