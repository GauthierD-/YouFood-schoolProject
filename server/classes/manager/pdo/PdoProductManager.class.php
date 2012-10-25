<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdoProductManager
 *
 * @author nice2k
 */

require_once 'AbstractPdoManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/models/Product.class.php';

class PdoProductManager extends AbstractPdoManager {
    
    public function addProduct($name, $price, $type, $imagePath, $country) {
		$query = $this->pdo->prepare("
			INSERT INTO product (name, price, type, image_url, country_id)
			VALUES (:name, :price, :type, :image_url, :country_id)
		");
		
		$query->bindValue(':name', $name);
		$query->bindValue(':price', $price);
                $query->bindValue(':type', $type);
                $query->bindValue(':image_url', $imagePath);
                $query->bindValue(':country_id', $country->getId());
		
		if($query->execute()) {
			return $this->pdo->lastInsertId();
		}
	}
        
   public function removeProduct($id) {
		$query = $this->pdo->prepare('DELETE FROM product WHERE id = :id');
		$query->bindValue(':id', $id);
		return $query->execute();
	}
        
   public function findProductsByCountry($country) {
		
		if(is_object($country)) {
			$products = array();	
	
			$query = $this->pdo->prepare("SELECT id, name, price, type, image_url, country_id FROM product WHERE country_id = :countryId");
			$query->bindValue(':countryId', $country->getId());
			$query->execute();
		
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			foreach($result as $row) {
				$products[] = new Product($row->id, $row->name, $row->price, $row->type, $row->image_url, $country);
			}
		
			return $products;
		}
	}
     
   public function findProductById($id) {
		$query = $this->pdo->prepare('SELECT id, name, price, type, image_url, country_id FROM product WHERE id=:id');
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
                $countryManager = ManagerFactory::getCountryManager();
                $country = $countryManager->findCountryById($result->country_id);
                
		if($result) {
			return new Product($result->id, $result->name, $result->price, $result->type, $result->image_url, $country);
		}
	}
        
   public function findAppetizersByCountry($country) {
		
		if(is_object($country)) {
			$products = array();
		
			$query = $this->pdo->prepare("SELECT id, name, price, type, image_url, country_id FROM product WHERE country_id = :countryId AND type = 1");
			$query->bindValue(':countryId', $country->getId());
			$query->execute();
		
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			foreach($result as $row) {
				$products[] = new Product($row->id, $row->name, $row->price, $row->type, $row->image_url, $country);
			}
                        
			return $products;
		}
	}
        
   public function findDishesByCountry($country) {
		
		if(is_object($country)) {
			$products = array();
		
			$query = $this->pdo->prepare("SELECT id, name, price, type, image_url, country_id FROM product WHERE country_id = :countryId AND type = 2");
			$query->bindValue(':countryId', $country->getId());
			$query->execute();
		
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			foreach($result as $row) {
				$products[] = new Product($row->id, $row->name, $row->price, $row->type,$row->image_url, $country);
			}
		
			return $products;
		}
	}
        
   public function findDessertsByCountry($country) {
		
		if(is_object($country)) {
			$products = array();
		
			$query = $this->pdo->prepare("SELECT id, name, price, type, image_url, country_id FROM product WHERE country_id = :countryId AND type = 3");
			$query->bindValue(':countryId', $country->getId());
			$query->execute();
		
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			foreach($result as $row) {
				$products[] = new Product($row->id, $row->name, $row->price, $row->type, $row->image_url, $country);
			}
		
			return $products;
		}
	}
        
   public function findDrinksByCountry($country) {
		
		if(is_object($country)) {
			$products = array();
		
			$query = $this->pdo->prepare("SELECT id, name, price, type, image_url, country_id FROM product WHERE country_id = :countryId AND type = 4");
			$query->bindValue(':countryId', $country->getId());
			$query->execute();
		
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			foreach($result as $row) {
				$products[] = new Product($row->id, $row->name, $row->price, $row->type, $row->image_url, $country);
			}	
		
			return $products;
		}
	}

        
    public function findAllProducts() {
                
		$results = array();
		
		$query = $this->pdo->prepare("SELECT * FROM product ORDER BY country_id");
		$query->execute();
		$countryManager = ManagerFactory::getCountryManager();
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
                    $country = $countryManager->findCountryById($result->country_id);
			$results[] = new Product($result->id, $result->name, $result->price, $result->type, $result->image_url, $country);
		}
		
		$query->closeCursor();
		
		return $results;
	}
                

}

?>
