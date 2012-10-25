
<a data-role="button" data-mini="true" data-icon="home" href="index.php">Accueil</a>
<?php if (isset($_SESSION['admin'])) { ?>
    
    <a data-role="button" data-mini="true" data-icon="gear" href="administration.php">Section Admin</a>
    
<?php } else { ?>
    
    <a data-role="button" data-mini="true" data-icon="gear" href="login.php">Login</a>
<?php } ?>