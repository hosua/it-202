<?php
include 'info.php';

$user = $_POST["user"];
$pass = $_POST["pass"];
$msg = $_POST["msg"];


function setChat($user, $pass, $msg)
{
    global $conn;
    $sql = "SELECT * FROM Users WHERE username = ? AND pass = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, $pass);
    $stmt->execute();

    $query_res = $stmt->get_result();
    if (mysqli_num_rows($query_res) == 0) {
        // error msg
        echo "FAILURE: \"$user\" \"$pass\" invalid. Msg: \"$msg\" did not send.";
    } else {
        // update chat with new message
        $sql = "UPDATE Users SET chat = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $msg, $user);
        $stmt->execute();
        $query_res = $stmt->get_result();
        echo "Successful update";
    }
}

setChat($user, $pass, $msg);
?>