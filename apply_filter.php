<?php
    session_start();
    if (isset($_SESSION['show_all'])) {
        unset($_SESSION['show_all']);
    } else {
        $_SESSION['show_all'] = true;
    }
    header("location: browse.php");
?>