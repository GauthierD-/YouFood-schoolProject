<?php

require 'required.php';

$productManager = ManagerFactory::getProductManager();
$countryManager = ManagerFactory::getCountryManager();
$country = $countryManager->findCountryOfTheWeek();
if(is_object($country)) {
	$appetizers = $productManager->findAppetizersByCountry($country);
	$dishes = $productManager->findDishesByCountry($country);
	$desserts = $productManager->findDessertsByCountry($country);
	$drinks = $productManager->findDrinksByCountry($country);
}

    if (isset($_POST['payment_status']) && $_POST['payment_status'] == "Completed") {
        
        unset($_SESSION['order']);
    }

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
        
        <a data-role="button" data-mini="true" data-icon="gear" href="administration.php">Section Admin</a>
        <a data-role="button" data-mini="true" data-icon="home" href="#">Accueil</a>
    </div>
    <div data-role="content">
        <h1>Le Pays de la semaine : <?php if(is_object($country)) echo $country->getName(); ?></h1>
        <h2>Entrées :</h2>
            <ul data-role="listview" data-inset="true">
            <?php if(isset($appetizers)) foreach($appetizers as $appetizer) { ?>

                <?php echo "<li><a href=\"client_order.php?id=".$appetizer->getId()."\"><img src=\"".$appetizer->getImagePath()."\"/>".$appetizer->getName()."  (".$appetizer->getPrice()."€)".'</a></li>'; }?>

            </ul>
        <h2>Plats :</h2>
            <ul data-role="listview" data-inset="true">
            <?php if(isset($dishes)) foreach($dishes as $dish) { ?>

                <?php echo "<li><a href=\"client_order.php?id=".$dish->getId()."\"><img src=\"".$dish->getImagePath()."\"/>".$dish->getName()."  (".$dish->getPrice()."€)".'</a></li>'; }?>

            </ul>
        <h2>Desserts :</h2>
            <ul data-role="listview" data-inset="true">
            <?php if(isset($desserts)) foreach($desserts as $dessert) { ?>

                <?php echo "<li><a href=\"client_order.php?id=".$dessert->getId()."\"><img src=\"".$dessert->getImagePath()."\"/>".$dessert->getName()."  (".$dessert->getPrice()."€)".'</a>'; }?>

            </ul>
        <h2>Boissons :</h2>
        <ul data-role="listview" data-inset="true">
            <?php if(isset($drinks)) foreach($drinks as $drink) { ?>

                <?php echo "<li><a href=\"client_order.php?id=".$drink->getId()."\"><img src=\"".$drink->getImagePath()."\"/>".$drink->getName()."  (".$drink->getPrice()."€)".'</a></li>'; }?>

            </ul>
    <a data-role="button" data-mini="true" data-inline="true" data-icon="star" href="client_order.php">Ma Commande</a>
       
    </div>
</div>

</body>
</HTML>
