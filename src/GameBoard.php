<?php 

namespace ConnectFour;

class GameBoard {

    private $rows;

    private $columns;

    private $board = array();

    const NOMOREHOLES = "You Cannot Drop a piece Here"; 

    const NOTCOLUMN = "This is not a Column"; 

    function __construct($rows = 6, $columns = 7) {
       $this->rows = $rows;
       $this->columns = $columns;
       $this->initalizeGameBoard();
    } 

    public function initalizeGameBoard () { 
        for ($i = 1; $i <= $this->rows; $i++) {
            $this->board[]= array();
	}
    }

    public function getTotalHoles() {
       return ($this->rows * $this->columns);
    }

    public function DropPiece($column, $color) {
        $this->validateColumn($column);              
        $row = $this->findFirstHole($column);
        $this->board[$row][$column] = $color; 
        return $row;  
    } 
  
    private function findFirstHole ($column) { 
        for ($i = 1; $i <= $this->rows; $i++) {
           if (empty($this->board[$i][$column])) {
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
   
    public function GetWholeBoard() {
	//won't need until sessions are used
    }

} 
