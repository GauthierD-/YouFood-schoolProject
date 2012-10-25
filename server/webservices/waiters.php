<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of waiters
 *
 * @author Tim
 */


require_once '../classes/models/Waiter.class.php';
require_once '../classes/manager/ManagerFactory.class.php';
session_start();

$waiterManager = ManagerFactory::getWaiterManager();

if(isset($_GET['do']) && $_GET['do'] == 'retrieve') {

    $waiters = $waiterManager->findAllWaiters();
    $json = json_encode($waiters);
    //var_dump($json);
    if ($_GET['callback']) {
        echo $_GET['callback'] . "($json);";
    // Normal JSON
    } else {
        echo $json;
    }
}


?>
