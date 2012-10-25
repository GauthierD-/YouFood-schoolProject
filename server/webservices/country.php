<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of country
 *
 * @author Tim
 */


require_once '../classes/models/Country.class.php';
require_once '../classes/manager/ManagerFactory.class.php';
session_start();

$countryManager = ManagerFactory::getCountryManager();

if(isset($_GET['get']) && $_GET['get'] == 'current') {

    $country = $countryManager->findCountryOfTheWeek();
    $json = json_encode($country);
    //var_dump($json);
    if ($_GET['callback']) {
        echo $_GET['callback'] . "($json);";
    // Normal JSON
    } else {
        echo $json;
    }
}


?>
