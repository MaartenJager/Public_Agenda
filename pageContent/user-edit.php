<?php
    session_start();
    if (isset( $_SESSION['accessLevel'] ))
    {
?>

    <?php if ($_SESSION['accessLevel'] == 1 || $_SESSION['accessLevel'] == 2): ?>
    Ingelogd met level 1 of 2
    <?php endif; ?>

<?php   
    }
    else
    {
	    echo "no priveleges bitch";
    }
?>
