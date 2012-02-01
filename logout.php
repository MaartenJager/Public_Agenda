<?php
    session_start();
    unset($_SESSION['user_id']);
    session_destroy();
    echo 'You\'re logged out succesfully!';
    //header("Location: /webdb1241/index.php");
?>
