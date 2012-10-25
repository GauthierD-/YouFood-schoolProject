<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdoRestaurantManager
 *
 * @author nice2k
 */

require_once 'AbstractPdoManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/models/Restaurant.class.php';

class PdoRestaurantManager extends AbstractPdoManager {
    
    public function addRestaurant($name, $country) {
		$query = $this->pdo->prepare("
			INSERT INTO restaurant (name, country_id)
			VALUES (:name, :country)
		");
		
		$query->bindValue(':name', $name);
                $query->bindValue(':country', $country->getId());
		
		if($query->execute()) {
			return $this->pdo->lastInsertId();
		}
	}
        
    public function removeRestaurant($id) {
		$query = $this->pdo->prepare('DELETE FROM restaurant WHERE id = :id');
		$query->bindValue(':id', $id);
		return $query->execute();
	}
        
    public function findAllRestaurants() {
                
		$results = array();
		
		$query = $this->pdo->prepare("SELECT * FROM restaurant");
		$query->execute();
                $countryManager = ManagerFactory::getCountryManager();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
                    $country = $countryManager->findCountryById($result->country_id);
                    $results[] = new Restaurant($result->id, $result->name, $country);
		}
		
		$query->closeCursor();
		
		return $results;
	}
        
    public function findRestaurantById($id) {
		$query = $this->pdo->prepare('SELECT * FROM restaurant WHERE id=:id');
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
                $countryManager = ManagerFactory::getCountryManager();
                $country = $countryManager->findCountryById($result->country_id);
                
		if($result) {
			return new Restaurant($result->id, $result->name, $country);
		}
	}
        
   public function findRestaurantByName($name) {
		$query = $this->pdo->prepare('SELECT * FROM restaurant WHERE name=:name');
		$query->bindValue(':name', $name);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
                $countryManager = ManagerFactory::getCountryManager();
                $country = $countryManager->findCountryById($result->country_id);
                
		if($result) {
			return new Restaurant($result->id, $result->name, $country);
		}
	}
        
}

?>
