<?php
    session_unset();
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    // session_destroy();
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    echo $_SESSION["user"];
    // header("location: index.php");
?>