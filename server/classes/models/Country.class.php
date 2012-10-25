<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of country
 *
 * @author nice2k
 */
class Country {
    
    public $id;
    public $name;
    public $is_chosen;
    
    public function __construct($id = null, $name, $is_chosen) { 
		$this->id = $id; 
		$this->name = $name; 
                $this->is_chosen = $is_chosen;	
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
        
        public function getIs_chosen() {
            return $this->is_chosen;
        }

        public function setIs_chosen($is_chosen) {
            $this->is_chosen = $is_chosen;
        }

    
}

?>
