<?php
    session_start();
    $user = $_SESSION['user'];
    echo "USER: $user";
    // session_unset();
    // ini_set("display_errors", 1);
    // ini_set("display_startup_errors", 1);
    // // session_destroy();
    // if (isset($_SESSION['user'])) {
    //     unset($_SESSION['user']);
    // }
    // header("location: index.php");
?>