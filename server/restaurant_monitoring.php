<?php

require 'required.php';

$restaurantManager = ManagerFactory::getRestaurantManager();
$orderManager = ManagerFactory::getOrderManager();
$restaurants = $restaurantManager->findAllRestaurants(); ?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
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
            <h3>Rechercher un restaurant :</h3><br/>
            <ul data-role="listview" data-inset="true" data-divider-theme="b" data-filter="true">
        <?php foreach($restaurants as $restaurant) { 
            
            $order_count = $orderManager->countOrdersByRestaurant($restaurant->getId());
            echo "<li><h3>".$restaurant->getName()."</h3>";
            echo "<p>Nombre de commandes : ".$order_count."</p>";
        }?>
            </li>
            </ul>
            
        </div>
    </body>
</html>
