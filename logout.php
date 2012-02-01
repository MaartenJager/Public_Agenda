<?php

    //function Logout()
    //{
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        echo 'You\'re logged out succesfully!';
        echo '<a href="http://websec.science.uva.nl/webdb1241">Click here to return to the main page</a>';
?>
