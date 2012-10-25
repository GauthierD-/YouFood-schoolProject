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
interface CountryManager {
    
	
	function addCountry($name);
			
	function removeCountry($id);
        
        function setCountryOfTheWeek($id);
        
        function unsetCountryOfTheWeek($id);
               
        function findAllCountries();
        
        function findCountryOfTheWeek();
	
        function findCountryById($id);
        
        function findCountryByName($name);
}

?>
