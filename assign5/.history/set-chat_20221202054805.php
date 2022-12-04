<?php
include 'info.php';
function setChat($user, $pass){
    global $conn;
    $sql = "SELECT * FROM User WHERE username = ? AND pass = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, $pass);
    $stmt->execute();
}
function getChat($user){
}
?>