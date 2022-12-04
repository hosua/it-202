<html>
<?php
session_start();
include 'info.php';
$session_user = "";
if (isset($_SESSION['user']))
    $session_user = $_SESSION['user'];

ini_set("display_errors", 1); // debugging
ini_set("display_startup_errors", 1); // debugging
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    // $sql = "SELECT * FROM Users WHERE username = \"$user\" AND pass = \"$pass\"";
    $sql = "SELECT * FROM Users WHERE LOWER(username) = LOWER(?) AND pass = ?";
    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    echo "-- $username $password --<br>";
    $query_res = $stmt->get_result();
    if (!$query_res) {
        echo "<p>Invalid username or password.</p>";
    } else {
        
    }
}
echo "USERNAME: $session_user<br>";
if (!$session_user) {
    $out = <<<EOF
            <form method=post action="index.php">
                <label for=user>Username: </label>
                <input type=text id=user name=user>
                <br> <br>
                <label for=pass>Password: </label>
                <input type=password id=pass name=pass>
                <input type="submit" value="Log in">
            </form>
EOF;
    echo "$out";
} else {
    echo "<p>Logged in as: $session_user</p>";
}
?>


</html>