<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of saveOrder
 *
 * @author Tim
 */

require_once '../classes/manager/ManagerFactory.class.php';
session_start();

$orderManager = ManagerFactory::getOrderManager();

if(!empty($_POST['order'])) {
    $json = $_POST['order'];
    //$json = '{"restaurantId": 1, "waiterId": 2, "table": 46, "transactionId": "3WB06748MA6177EEL", "dishes": [{"dishId": 3},{"dishId": 1},{"dishId": 16}]}';
    $obj = json_decode($json);
    $restaurantId = $obj->{'restaurantId'};
    $waiterId = $obj->{'waiterId'};
    $table = $obj->{'table'};
    $dishes = $obj->{'dishes'};
    $transactionId = $obj->{'transactionId'};
    $orderId = uniqid();
    
    foreach ($dishes as $dish) {
        $orderManager->addDish($orderId, $dish->dishId, $restaurantId, $waiterId, $table, $transactionId);
    }
}


?>
