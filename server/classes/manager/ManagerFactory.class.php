<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagerFactory
 *
 * @author nice2k
 */

require_once 'CountryManager.class.php';
require_once 'WaiterManager.class.php';
require_once 'ProductManager.class.php';
require_once 'RestaurantManager.class.php';
require_once 'OrderManager.class.php';

require_once 'pdo/PdoCountryManager.class.php';
require_once 'pdo/PdoWaiterManager.class.php';
require_once 'pdo/PdoProductManager.class.php';
require_once 'pdo/PdoRestaurantManager.class.php';
require_once 'pdo/PdoOrderManager.class.php';

final class ManagerFactory {
	
	private static $pdo = true;
	
	private function __construct() {}
	
	public static function getCountryManager() {
		if(self::$pdo) {
			return new PdoCountryManager();
		} 
	}
	
	public static function getWaiterManager() {
		if(self::$pdo) {
			return new PdoWaiterManager();
		} 
	}
	
	public static function getProductManager() {
		if(self::$pdo) {
			return new PdoProductManager();
		}
	}
        
        public static function getRestaurantManager() {
		if(self::$pdo) {
			return new PdoRestaurantManager();
		}
	}
        
        public static function getOrderManager() {
		if(self::$pdo) {
			return new PdoOrderManager();
		}
	}
	
}

?>
