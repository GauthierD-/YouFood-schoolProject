<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author nice2k
 */
class Order {
    
    public $id;
    public $restaurant;
    public $waiter;
    public $table;
    public $transactionId; 
    
    function __construct($id = null, $restaurant = null, $waiter = null, $table, $transactionId) {
        $this->id = $id;
        $this->restaurant = $restaurant;
        $this->waiter = $waiter;
        $this->table = $table;
        $this->transactionId = $transactionId;
    }

    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRestaurant() {
        return $this->restaurant;
    }

    public function setRestaurant($restaurant) {
        $this->restaurant = $restaurant;
    }

    public function getWaiter() {
        return $this->waiter;
    }

    public function setWaiter($waiter) {
        $this->waiter = $waiter;
    }

    public function getTable() {
        return $this->table;
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function getTransactionId() {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
    }


    
}

?>
