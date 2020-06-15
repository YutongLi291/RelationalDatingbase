<?php
    session_start();

    // /toggle for show all
    if (isset($_SESSION['show_pic'])) {
        unset($_SESSION['show_pic']);
    } else {
        $_SESSION['show_pic'] = true;
    }

    header("location: browse.php");
?>