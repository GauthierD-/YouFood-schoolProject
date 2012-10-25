<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdoOrderManager
 *
 * @author Tim
 */

require_once 'AbstractPdoManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/models/Order.class.php';

class PdoOrderManager extends AbstractPdoManager {
    
    public function addDish($orderId, $productId, $restaurantId, $waiterId, $table = NULL, $transactionId = NULL ) {
		$query = $this->pdo->prepare("INSERT INTO `orders`(`order_id`, `product_id`, `restaurant_id`, `waiter_id`, `transaction_id`, `table`, `status`) VALUES (:o_id, :p_id, :r_id, :w_id, :t_id, :table, :status_code)");
		$query->execute(array(':o_id' => $orderId, ':p_id' => $productId, ':r_id' => $restaurantId, ':w_id' => $waiterId, ':t_id' => $transactionId, ':table' => $table, ':status_code' => 1));
	}
        
    public function setDishAsProcessed($orderId){
                $query = $this->pdo->prepare('UPDATE orders SET status = 0 WHERE order_id = :id');
		$query->bindValue(':id', $orderId);
                return $query->execute();
    }
    
    public function findNotProcessedDishes() {
		$query = $this->pdo->prepare('SELECT * FROM orders WHERE status = 1');
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
                $restaurantManager = ManagerFactory::getRestaurantManager();
                $waiterManager = ManagerFactory::getWaiterManager();
                $restaurant = $restaurantManager->findRestaurantById($result->restaurant_id);
                $waiter = $waiterManager->findWaiterById($result->waiter_id);
                
                while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Order($result->order_id, $restaurant, $waiter, $result->table, $result->transaction_id);
		}
		
		$query->closeCursor();
		
		return $results;
               
	}
        
    public function countOrdersByRestaurant($id) { 
        
		$query = $this->pdo->prepare('SELECT COUNT(DISTINCT order_id) FROM orders WHERE restaurant_id=:id');
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetchColumn();
                return $result;
                
                
    }
    
    public function countOrdersByProduct($id) { 
        
		$query = $this->pdo->prepare('SELECT COUNT(product_id) FROM orders WHERE product_id=:id');
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetchColumn();
                return $result;
                
                
    }
    
    public function countProductOrdersByRestaurant($id_product, $id_restaurant) {
       
                $query = $this->pdo->prepare('SELECT COUNT(product_id) FROM orders WHERE product_id=:prodid AND restaurant_id=:restid');
		$query->bindValue(':prodid', $id_product);
                $query->bindValue(':restid', $id_restaurant);
		$query->execute();
		$result = $query->fetchColumn();
                return $result;
      
   } 
   
}

?>
