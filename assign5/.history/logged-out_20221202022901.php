<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    session_start();
    $user = $_SESSION['user'];
    echo "USER: $user";
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    session_destroy();
    session_unset();
    // header("location: index.php");
?>