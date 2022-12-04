<?php
include 'info.php';

$user = $_POST["user"];

function listenChat($user){
    global $conn;
    $sql = "SELECT * FROM Users WHERE username = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $user);
    $stmt->execute();

    $query_res = $stmt->get_result();
    if (mysqli_num_rows($query_res) == 0) {
        // Return error from php
        // Source: https://stackoverflow.com/questions/4417690/return-errors-from-php-run-via-ajax
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'ERROR', 'code' => -100)));
    } else {
        // get message
        echo "Successful update";
    }
}

listenChat($user);
?>