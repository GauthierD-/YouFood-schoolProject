<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CountryManager
 *
 * @author nice2k
 */
interface OrderManager {
    
	function addDish($orderId, $productId, $restaurantId, $waiterId, $table, $transactionId);
			
	function setDishAsProcessed($orderId);
        
        function findNotProcessedDishes();
        
        function countOrdersByRestaurant($id);
        
        function countOrdersByProduct($id);
        
        function countProductOrdersByRestaurant($id_product, $id_restaurant);
}

?>
