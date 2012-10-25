<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdoCountryManager
 *
 * @author nice2k
 */

require_once 'AbstractPdoManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/models/Country.class.php';

class PdoCountryManager extends AbstractPdoManager {
    
    public function addCountry($name) {
		$query = $this->pdo->prepare("
			INSERT INTO country (name)
			VALUES (:name)
		");
		
		$query->bindValue(':name', $name);
		
		if($query->execute()) {
			return $this->pdo->lastInsertId();
		}
	}
        
    public function removeCountry($id) {
		$query = $this->pdo->prepare('DELETE FROM country WHERE id = :id');
		$query->bindValue(':id', $id);
		return $query->execute();
	}
        
    public function setCountryOfTheWeek($id) {
                $query = $this->pdo->prepare('UPDATE country SET is_chosen = 1 WHERE id = :id');
		$query->bindValue(':id', $id);
                return $query->execute();
                    
        }
   
    public function unsetCountryOfTheWeek($id) {
                $query = $this->pdo->prepare('UPDATE country SET is_chosen = 0 WHERE id = :id');
		$query->bindValue(':id', $id);
                return $query->execute();
  
        }


   public function findAllCountries() {
                
		$results = array();
		
		$query = $this->pdo->prepare("SELECT * FROM country");
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Country($result->id, $result->name, $result->is_chosen);
		}
		
		$query->closeCursor();
		
		return $results;
	}
        
    public function findCountryOfTheWeek() {
		$query = $this->pdo->prepare('SELECT * FROM country WHERE is_chosen = 1');
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result) {
			return new Country($result->id, $result->name, $result->is_chosen);
		}
	}
        
    public function findCountryById($id) {
		$query = $this->pdo->prepare('SELECT * FROM country WHERE id=:id');
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result) {
			return new Country($result->id, $result->name, $result->is_chosen);
		}
	}
        
   public function findCountryByName($name) {
		$query = $this->pdo->prepare('SELECT * FROM country WHERE name=:name');
		$query->bindValue(':name', $name);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result) {
			return new Country($result->id, $result->name, $result->is_chosen);
		}
	}
}

?>
