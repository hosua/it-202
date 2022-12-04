<?php
    session_destroy();
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    if (isset($_SESSION['employee-id'])) {
        unset($_SESSION['user']);
    }
    // header("location: index.php");
?>