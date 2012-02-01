<?php
    if (isset( $_SESSION['accessLevel'] ))
    {
?>

    <?php if ($_SESSION['accessLevel'] == 1): ?>
    Ingelogd met level 1
    <?php elseif ($_SESSION['accessLevel'] == 2): ?>
    Ingelogd met level 2
    <?php else: ?>
    Niet ingelogd
    <?php endif; ?>

<?php   
    }
    else
    {
	    echo "no priveleges bitch";
    }
?>
