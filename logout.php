<?php

    //function Logout()
    //{
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
    //}
?>
