<?php
include 'info.php';
function setChat($user, $pass){
    global $conn;
    $sql = "SELECT * FROM User WHERE username = ? AND pass = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, $pass);
    $stmt->execute();
    $query_res = $stmt->get_result();
    if (mysqli_num_rows())
}
function getChat($user){
}
?>