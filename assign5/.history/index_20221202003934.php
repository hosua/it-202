<html>
<?php
session_start();
include 'info.php';
$username = "";
if (isset($_SESSION['user']))
    $username = $_SESSION['user'];

ini_set("display_errors", 1); // debugging
ini_set("display_startup_errors", 1); // debugging
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    // $sql = "SELECT * FROM Users WHERE username = \"$user\" AND pass = \"$pass\"";
    $sql = "SELECT * FROM Users WHERE username = ? AND pass = ?";
    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute(); 

    $query_res = $stmt->get_result();
    if (!$query_res) {
        echo "<p>Invalid username or password.</p>";
    } else {
    }
}
echo "USERNAME: $username<br>";
if (!$username) {
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
    echo "<p>Logged in as: $username</p>";
}
?>


</html>