<?php

require 'required.php';

$productManager = ManagerFactory::getProductManager();
$orderManager = ManagerFactory::getOrderManager();
$countryManager = ManagerFactory::getCountryManager();
$restaurantManager = ManagerFactory::getRestaurantManager();
$products = $productManager->findAllProducts();
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
            <h3>Rechercher un produit :</h3><br/>
            <ul data-role="listview" data-inset="true" data-divider-theme="b" data-filter="true">
        <?php foreach($products as $product) { 
            
            $orders_number = $orderManager->countOrdersByProduct($product->getId());
            $country = $product->getCountry();
            
            echo "<li data-role=\"list-divider\">".$country->getName()."</li>";
            echo "<li>";
            echo "<h3>".$product->getName()."</h3>";
            echo "<p>Nombre de commandes : ".$orders_number."</p>";
            foreach($restaurants as $restaurant) {
            $product_count = $orderManager->countProductOrdersByRestaurant($product->getId(), $restaurant->getId());
            echo "<p>Commandé ".$product_count." fois à ".$restaurant->getName()."</p>";
                            
            }
            echo "</li>";
            }?>
            
            </ul>
            
        </div>
    </body>
</html>