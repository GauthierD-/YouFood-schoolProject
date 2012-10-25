<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of restaurants
 *
 * @author Tim
 */


require_once '../classes/models/Restaurant.class.php';
require_once '../classes/manager/ManagerFactory.class.php';
session_start();

$restaurantManager = ManagerFactory::getRestaurantManager();

if(isset($_GET['do']) && $_GET['do'] == 'retrieve') {

    $restaurants = $restaurantManager->findAllRestaurants();
    $json = json_encode($restaurants);
    //var_dump($json);
    if ($_GET['callback']) {
        echo $_GET['callback'] . "($json);";
    // Normal JSON
    } else {
        echo $json;
    }
}


?>
