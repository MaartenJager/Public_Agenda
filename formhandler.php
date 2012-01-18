<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['addUser'])) {
            echo("Add user form gebruikt");
        }
        
        else if (isset($_POST['getUser'])) {
            echo("Get user form gebruikt");
        }

        else if (isset($_POST['getAllUsers '])) {
            echo("Get user form gebruikt");
        }
    }
?>
