<?php 

namespace ConnectFour;

class Users { 

   private $name;

   function __construct($user = Computer) {
      $this->setName($user); 
   }
   
   private function setName($user) {
      $this->name = $user;      
   }

   public function getName() {
      return $this->name;
   }

}
