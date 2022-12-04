<?php
include 'info.php';
function setChat($user){
    $sql = "SELECT * FROM User WHERE name = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $user);
    $stmt->execute();
}
function getChat($user){
}
?>