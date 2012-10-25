<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdoWaiterManager
 *
 * @author Tim
 */

require_once 'AbstractPdoManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/models/Waiter.class.php';

class PdoWaiterManager extends AbstractPdoManager {
    
    public function findAllWaiters() {
                
		$results = array();
		
		$query = $this->pdo->prepare("SELECT * FROM waiter");
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) { 
                        $waiter = new Waiter($result->firstname, $result->lastname);
                        $waiter->id= $result->id;
			$results[] = $waiter; 
		}
		
		$query->closeCursor();
		
		return $results;
	}
        
    public function findWaiterById($id) {
		$query = $this->pdo->prepare('SELECT * FROM waiter WHERE id=:id');
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result) {
			return new Waiter($result->id, $result->firstname, $result->lastname);
		}
	}
}

?>
