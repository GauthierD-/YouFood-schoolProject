<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Restaurant
 *
 * @author nice2k
 */
class Restaurant {
    
    public $id;
    public $name;
    public $country;
    
    function __construct($id = null, $name, $country) {
        $this->id = $id;
        $this->name = $name;
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

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }


}

?>
