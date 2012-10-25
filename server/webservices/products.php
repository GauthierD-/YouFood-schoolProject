<?php

require_once '../classes/models/Country.class.php';
require_once '../classes/models/Product.class.php';
require_once '../classes/models/Waiter.class.php';
require_once '../classes/manager/ManagerFactory.class.php';
session_start();

$productManager = ManagerFactory::getProductManager();
$countryManager = ManagerFactory::getCountryManager();
$country = $countryManager->findCountryOfTheWeek();


if(isset($_GET['type']) && is_object($country)) {
	
	switch($_GET['type']) {
		case "appetizers":
                    $appetizers = $productManager->findAppetizersByCountry($country);
                    $json = json_encode($appetizers);
                    // Using JSONP (cross domain requests)
                    if ($_GET['callback']) {
                        echo $_GET['callback'] . "($json);";
                    // Normal JSON
                    } else {
                        echo $json;
                    }
                    break ;
                    
                case "dishes":
                    $dishes = $productManager->findDishesByCountry($country);
                    $json = json_encode($dishes);
                    // Using JSONP (cross domain requests)
                    if ($_GET['callback']) {
                        echo $_GET['callback'] . "($json);";
                    // Normal JSON
                    } else {
                        echo $json;
                    }
                    break ;
                    
                 case "desserts":
                    $desserts = $productManager->findDessertsByCountry($country);
                    $json = json_encode($desserts);
                    // Using JSONP (cross domain requests)
                    if ($_GET['callback']) {
                        echo $_GET['callback'] . "($json);";
                    // Normal JSON
                    } else {
                        echo $json;
                    }
                    break ;
                    
                 case "drinks":
                    $drinks = $productManager->findDrinksByCountry($country);
                    $json = json_encode($drinks);
                    // Using JSONP (cross domain requests)
                    if ($_GET['callback']) {
                        echo $_GET['callback'] . "($json);";
                    // Normal JSON
                    } else {
                        echo $json;
                    }
                    break ;
	}
}

if(isset($_GET['id'])) {
    $product = $productManager->findProductById(intval($_GET['id']));
    $json = json_encode($product);
    //var_dump($json);
    if ($_GET['callback']) {
        echo $_GET['callback'] . "($json);";
    // Normal JSON
    } else {
        echo $json;
    }
}

?>