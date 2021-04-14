<?php
    session_start();
    session_destroy();
    // unset($_SESSION['username']);
    // unset($_SESSION['errors']);
    header('Location: ../login.php');
?>