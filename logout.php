<?php
    session_start();
    unset($_SESSION['userId']);
    unset($_SESSION['email']);
    unset($_SESSION['accessLevel']);
    session_destroy();
    echo 'You\'re logged out succesfully!';
    //header("Location: /webdb1241/index.php");
?>
