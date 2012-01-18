<?php
    $_CONFIG["Username"] = 'webdb1241';
    $_CONFIG["Password"] = 'qetha8ra';
    $_CONFIG["Host"]     = 'localhost';
    $_CONFIG["Database"] = 'webdb1241';
     
    $connection = mysql_connect($_CONFIG["Host"], $_CONFIG["Username"], $_CONFIG["Password"]);     
    if($Verbinding == false) // Connection failed!
    {
            trigger_error("Kan geen verbinding maken met de database");
    }
     
    $DbSelect = mysql_select_db($_CONFIG["Database"], $Verbinding);     
    if ($DbSelect == false)
    {
            trigger_error("Kan de database niet selecteren");
    }
 
?>
