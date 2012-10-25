<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author nice2k
 */
class Product {
    
    public $id;
    public $name;
    public $price;
    public $type;
    public $imagePath;
    public $country;
    
    public function __construct($id = null, $name, $price, $type, $imagePath, $country) { 
		$this->id = $id; 
		$this->name = $name; 
                $this->price = $price;
                $this->type = $type;
                $this->imagePath = $imagePath;
                $this->country = $country;
		
	}
	
	public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }
        public function getPrice() {
            return $this->price;
        }

        public function setPrice($price) {
            $this->price = $price;
        }
        
        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }
        
        public function getImagePath() {
            return $this->imagePath;
        }

        public function setImagePath($imagePath) {
            $this->imagePath = $imagePath;
        }

        public function getCountry() {
            return $this->country;
        }

        public function setCountry($country) {
            $this->country = $country;
        }

}


?>
