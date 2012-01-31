<?php
    echo $_SESSION['accessLevel'];

    if (isset( $_SESSION['accessLevel'] )){
    	echo "accessLevel is set";
    	
        if (($_SESSION['accessLevel'] == 2) || ($_SESSION['accessLevel'] == 1)){
            echo "accessLevel heeft waarde 1 of 2" ;
        }
        else
        {   
            echo "accessLevel heeft niet waarde 1 of 2" ;
        }
    }
    
    else{
        echo "accessLevel is not set";
    }
?>
