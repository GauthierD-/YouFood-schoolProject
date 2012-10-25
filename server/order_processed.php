<?php
require_once 'required.php';

$orderManager = ManagerFactory::getOrderManager();
$orderManager->setDishAsProcessed($_GET['id']);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    
    <title>YouFood Inc.</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
    
    </head>
    <body>
        <div data-role="page">
        <div data-role="header">
            
    <h1>Bienvenue sur YouFood Inc.</h1>
    
    <a data-role="button" data-mini="true" data-icon="gear" href="administration.php">Section Admin</a>
    <a data-role="button" data-mini="true" data-icon="home" href="index.php">Accueil</a>
    </div>
        <div data-role="content">
            <h2>La commande <?php echo $_GET['id'];?> a été passée en statut : traitée</h2>
            <h3><a href="current_orders.php">Retour aux commandes</a></h3>
        </div>
    </body>
</html>
