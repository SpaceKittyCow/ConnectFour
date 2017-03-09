<?php 

use \ConnectFour\GamePieces;

namespace ConnectFour;

class Users { 

   private $name;

   private $color;   

   private $gameBoard;   

   private $gamePieces;   

   const NAMEERROR = 'Please Provide a UserName';
   const COLORERROR = 'Please Choose a Color';

   function __construct($gameBoard, $name = '', $color = '') { 
      $this->setName($name);
      $this->setColor($color);
      $this->gameBoard = $gameBoard;
      $this->gamePieces = new GamePieces($this->gameBoard->GetTotalHoles());
   }
   
   public function getName() {
      return $this->name;
   }
   
   public function getColor() {
      return $this->color;
   }

   private function setName($name) {
       if (!empty($name)) { 
           $this->name = $name; 
       } else {
           throw new \Exception(self::NAMEERROR);
       }
   } 

   private function setColor ($color) {
       if (!empty($color)) {
           $this->color = $color; 
       } else {
           throw new \Exception(self::COLORERROR);
       }
   }

  public function SetPiece($column){
     $this->gamePieces->UsePiece();
     return $this->gameBoard->DropPiece($column, $this->getColor());
  }



}
