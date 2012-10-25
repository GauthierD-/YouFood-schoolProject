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
    
    <a data-role="button" data-mini="true" data-icon="gear" href="#">Section Admin</a>
    <a data-role="button" data-mini="true" data-icon="home" href="index.php">Accueil</a>
    </div>
        <div data-role="content">
        <h3>Modifications :</h3>
        <a data-role="button" href="add_country.php">Ajouter un pays</a>
        <a data-role="button" href="add_product.php">Ajouter un produit à un menu</a>
        <a data-role="button" href="add_restaurant.php">Ajouter un restaurant</a>
        <a data-role="button" href="delete_product.php">Supprimer un produit d'un menu</a>
        <a data-role="button" href="change_country.php">Changer le pays de la semaine</a>
        <h3>Statistiques :</h3>
        <a data-role="button" href="restaurant_monitoring.php">Statistiques par restaurant</a>
        <a data-role="button" href="product_monitoring.php">Statistiques par produit</a>
        <h3>Gérer les commandes en cours :</h3>
        <a data-role="button" data-theme="b" rel="external" href="current_orders.php">Commandes</a>
        </div>
    </body>
</html>
