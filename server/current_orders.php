<?php 
header("Refresh: 10;");
require 'required.php';

$orderManager = ManagerFactory::getOrderManager();
$orders = $orderManager->findNotProcessedDishes();

?>

<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="UTF-8">
    <title>YouFood Inc.</title>
    
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>

</head>
<body>
<div data-role="page">
    <div data-role="header">
        <h1>Bienvenue sur YouFood Inc.</h1>
        
        <a data-role="button" data-mini="true" data-icon="gear" rel="external" href="administration.php">Section Admin</a>
        <a data-role="button" data-mini="true" data-icon="home" rel="external" href="index.php">Accueil</a>
    </div>
    <div data-role="content">
        <h1>Commandes en attente :</h1>
        <ul data-role="listview" data-inset="true">
        <?php
        if($orders != null) {
         foreach($orders as $order) {
                        echo "<li><a href=\"#\">Une commande a été passée table : ".$order->getTable()."</a><a rel=\"external\" href=\"order_processed.php?id=".$order->getId()."\" data-icon=\"minus\">Reglé</a></li>"; } } ?>
        </ul>
    </div>
</div>

</body>
</HTML>
