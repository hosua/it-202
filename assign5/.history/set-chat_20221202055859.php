<?php
include 'info.php';
function setChat($user, $pass, $msg)
{
    global $conn;
    $sql = "SELECT * FROM User WHERE username = ? AND pass = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, $pass);
    $stmt->execute();

    $query_res = $stmt->get_result();
    if (mysqli_num_rows($query_res) == 0) {
        // error msg
    } else {
        // update chat with new message
        $sql = "UPDATE Users SET chat = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $msg);
        $stmt->execute();

        $query_res = $stmt->get_result();
    }
    if (isset($_POST['set-chat'])) {
        setChat();
    }
}
?>