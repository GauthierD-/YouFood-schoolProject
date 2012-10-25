<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestaurantManager
 *
 * @author nice2k
 */
interface RestaurantManager {
    
    
        function addRestaurant($name, $country);
        
        function removeRestaurant($id);
        
        function findAllRestaurants();
        
        function findRestaurantById($id);
        
        function findRestaurantByName($name);

    
}

?>
