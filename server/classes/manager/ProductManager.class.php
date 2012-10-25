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
interface ProductManager {
    
	
	function addProduct($name, $price, $type, $country);
			
	function removeProduct($id);
        
        function findProductsByCountry($country);
        
        function findProductById($id);
        
        function findAppetizersByCountry($country);
        
        function findDishesByCountry($country);
        
        function findDessertsByCountry($country);
        
        function findDrinksByCountry($country);
        
        function findAllProducts();
	
}

?>
