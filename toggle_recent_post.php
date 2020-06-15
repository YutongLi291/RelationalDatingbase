<?php
    session_start();

    // /toggle for show all
    if (isset($_SESSION['show_recent_post'])) {
        unset($_SESSION['show_recent_post']);
    } else {
        $_SESSION['show_recent_post'] = true;
    }

    header("location: browse.php");
?>