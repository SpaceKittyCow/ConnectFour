<?php 

namespace ConnectFour;

class GameBoard {

    private $rows;

    private $columns;

    private $state = array();

    const NOMOREHOLES = "You Cannot Drop a piece Here"; 

    const NOTCOLUMN = "This is not a Column"; 

    function __construct($state = '', $rows = 6, $columns = 7) {
       $this->rows = $rows;
       $this->columns = $columns;
       (!empty($state)) ? $this->setState($state) : $this->initalizeGameBoard();
    } 

    public function initalizeGameBoard () { 
        $cleanArray = array();
        for ($a = 1; $a <= $this->columns; $a++) {
            $cleanArray[$a] = '';
        } 

        for ($i = 1; $i <= $this->rows; $i++) {
            $this->state[$i]= $cleanArray;
	}
    }

    public function getTotalHoles() {
       return ($this->rows * $this->columns);
    }

    public function DropPiece($column, $color) {
        $this->validateColumn($column);              
        $row = $this->findFirstHole($column);
        $this->state[$row][$column] = $color; 
        return $row;  
    } 
  
    private function findFirstHole ($column) { 
        for ($i = 1; $i <= $this->rows; $i++) {
           if (empty($this->state[$i][$column])) {
              return $i;
           }
        }
        throw new \Exception (self::NOMOREHOLES);
    }

    private function ValidateColumn($column) {
        if ($column > $this->columns) {
            throw new \Exception (self::NOTCOLUMN);
        }
    }
   
    public function getState() {
        return $this->state;
    }

    public function setState($state) { 
        //needs validation
        $this->state = $state;       
    }

} 
