<h1>Profiel</h1>

<?php if (isset( $_SESSION['accessLevel'] )): ?>

    <?php if ($_SESSION['accessLevel'] == 1): ?>
        Ingelogd met level 1
    <?php elseif ($_SESSION['accessLevel'] == 2): ?>
        Ingelogd met level 2
    <?php else: ?>
        Wel ingelogd, geen rechten
    <?php endif; ?>

<?php else: ?>
    <p>U bent niet ingelogd, geen profiel om weer te geven!</p>
<?php endif; ?>
